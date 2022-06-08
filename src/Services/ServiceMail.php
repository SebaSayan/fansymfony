<?php

namespace App\Services;

use Mailjet\Client;
use Mailjet\Resources;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ServiceMail extends AbstractController
{
    public function sendMail($email, $name, $subject, $content)
    {
        $mj = new Client($this->getParameter('mailjet_public_key'), $this->getParameter('mailjet_private_key'), true, ['version' => 'v3.1']);

        $body = [
            'Messages' => [
                [
                    'From' => [
                        'Email' => $this->getParameter('webmaster_email'),
                        'Name' => "FAN'COIFFURE"
                    ],
                    'To' => [
                        [
                            'Email' => $email,
                            'Name' => $name
                        ]
                    ],
                    'TemplateID' => 3892403,
                    'TemplateLanguage' => true,
                    'Subject' => $subject,
                    'Variables' => [
                        'content' => $content
                    ]
                ]
            ]
        ];
        $response = $mj->post(Resources::$Email, ['body' => $body]);
        $response->success();
    }
}