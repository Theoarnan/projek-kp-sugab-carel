<?php


class Register extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("UsersModel");
    }

    public function index()
    {
        $data = array(
            "page" => "register/form_register"
        );
        $this->load->view("layout/login", $data);
    }

    public function prosesRegister()
    {
        $nama = $this->input->post("nama", true);
        $email = $this->input->post("email", true);
        $password = $this->input->post("password", true);
        $user = array(
            "nama" => $nama,
            "email" => $email,
            "password" => md5($password),
            "token" => md5($email)
        );
        $this->UsersModel->insert($user);
        $this->sendEmail($user);
        redirect('login');
    }
    public function otwEmail()
    {
        $data = array(
            "page" => "register/otw_email"
        );
        $this->load->view("layout/login", $data);
    }

    public function aktivasi($token)
    {
        $user = $this->UsersModel->getByToken($token);
        $data = array("is_active" => 0);
        $this->UsersModel->update($user->id, $data);
        redirect("login");
    }

    private function sendEmail($user)
    {
        $config = array(
            'useragent' => 'CodeIgniter',
            'protocol' => 'smtp',
            'mailpath' => '/usr/sbin/sendmail',
            'smtp_host' => 'smtp.gmail.com',
            'smtp_user' => 'elgabriel994@gmail.com',
            'smtp_pass' => "Gabriel123456",
            'smtp_port' => 465,
            'smtp_keepalive' => TRUE,
            'smtp_crypto' => 'ssl',
            'wordwrap' => TRUE,
            'wrapchars' => 76,
            'mailtype' => 'html',
            'charset' => 'utf-8',
            'validate' => TRUE,
            'crlf' => "\r\n",
            'newline' => "\r\n",
        );

        $dataSend = array(
            "user" => $user
        );


        $body = $this->load->view('mail/mail_body', $dataSend, TRUE);
        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from('elgabriel994@gmail.com', 'Gabriel');
        $this->email->to($user["email"]);
        // $this->email->cc("gabriel@student.ukrimuniversity.ac.id");
        $this->email->subject("Project RPL");
        $this->email->message($body);
        if ($this->email->send()) {
            return true;
        } else {
            echo $this->email->print_debugger();
            return false;
        }
        //    }
    }
}
