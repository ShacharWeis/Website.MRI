<?php
require dirname(__DIR__) . '/vendor/autoload.php';

use Dotenv\Dotenv;
use Mailgun\Mailgun;
use Symfony\Component\HttpFoundation\Request;
use Waavi\Sanitizer\Sanitizer;
use GuzzleHttp\Client;

class Submit
{
    protected $formData;

    /**
     * Submit constructor.
     */
    public function __construct()
    {
        

        $request = Request::createFromGlobals();
        $this->formData = $request->request->all();
        $dotenv = Dotenv::create(dirname(__DIR__));
        $dotenv->load();
        
        $this->init();
    }

    private function init()
    {
        // Sanitize Data
        $sanitizedData = $this->formSanitize($this->formData);
        
        if (empty($this->formData['g-recaptcha-response'])) {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'Missing reCaptcha',
                'reason' => 'The reCaptcha is missing.',
            ));
            return;
        }
        $client = new Client();
        $response = $client->post('https://www.google.com/recaptcha/api/siteverify',
            [
                'form_params' => [
                    'secret' => env('RECAPTCHA_SECRET_KEY', false),
                    'response' => $this->formData['g-recaptcha-response']
                ]
            ]
        );
        $body = json_decode((string)$response->getBody());
        if (!$body->success) {
            echo json_encode(array(
                'status' => 'error',
                'message' => 'reCaptcha Error',
                'reason' => 'Please try again after passing the reCaptcha',
            ));
            return;
        };
        // Send email via service
        $this->formTransmission($sanitizedData);
        
        // Return success
        echo json_encode(['status' => 'success']);
        return;
    }

    private function formSanitize($data)
    {
        $filters = [
            'name' => 'trim|escape|capitalize|cast:string',
            'email' => 'trim|escape|lowercase|cast:string',
            'company' => 'trim|escape|capitalize|cast:string',
            'message' => 'trim|escape|cast:string',
            'g-recaptcha-response' => 'trim|escape|cast:string',
        ];
        return (new Sanitizer($data, $filters))->sanitize();
    }

    private function formTransmission($data)
    {
        $submission = (object)$data;

        $name = $data['name'];
        $email = $data['email'];

        $email = new \SendGrid\Mail\Mail();

        $email->setFrom("vice@packet39.com", "EmmaRye Contact Form");
        $email->setReplyTo($name, $email);
        $email->setSubject("Contact Form Submission from $name from emmarye.com");
        //$email->addTo("info@vral.ca", "vral.ca");
        $email->addTo("dylan@gnarledrootsystems.com", "vral.ca");
        $email->addContent("text/html",
                "<strong>Name: </strong> $submission->name <br/><br/>
                <strong>Email: </strong> $submission->email <br/><br/>
                <strong>Company: </strong> $submission->company <br/><br/>
                <strong>Form Message: </strong><br/> $submission->message"
        );
        $sendgrid = new \SendGrid(getenv('SENDGRID_API_KEY'));
        try {
            $response = $sendgrid->send($email);
            print $response->statusCode() . "\n";
            print_r($response->headers());
            print $response->body() . "\n";
        } catch (Exception $e) {
            echo 'Caught exception: '. $e->getMessage() ."\n";
        }

        /*$mailgun = Mailgun::create(getenv('MAILGUN_KEY'));
        $mailgun->messages()->send(getenv('MAILGUN_DOMAIN'), [
            'from' => 'no-reply@emmarye.com',
            'h:Reply-To' => "$name <$email>",
            'to' => getenv('MAILGUN_RECIPIENT'),
            'subject' => "Contact Form Submission from $name from emmarye.com",
            'html' => "
                <strong>Name: </strong> $submission->name <br/><br/>
                <strong>Email: </strong> $submission->email <br/><br/>
                <strong>Company: </strong> $submission->company <br/><br/>
                <strong>Form Message: </strong><br/> $submission->message"
        ]);*/
    }
}
