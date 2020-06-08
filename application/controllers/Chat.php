<?php



require_once APPPATH . 'libraries/codeigniter-predis/src/Redis.php';


class Chat extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();


            $this->redis = new \CI_Predis\Redis();
            $this->load->model('jwt_model', 'jwt');
            $this->load->model('Chat/MessageFactory', 'chat');
    }

    function chat_id() {
    				$this->load->library('uuid');
    				$id = $this->uuid->v4();
    				$id = substr($id, 4);
    				return $id;
    }


  public function getMessage(){


    $receiver =   $this->input->post('receiver_conn_id');

    if($this->jwt->getToken() && $receiver){

      $sender = $this->jwt->getToken()[0]->conn_id;

      $studentMessage = $this->chat->createStudentMessage();


      $get = $studentMessage->get($sender, $receiver) ?  $studentMessage->get($sender, $receiver)[0] : '';



      echo json_encode($get ? $get->messages : '');

    }
}


public function createMessage(){


  if($this->jwt->getToken()){

    $user =  $this->jwt->getToken()[0];



    $config = array(

  array(

    'field' => 'receiver_conn_id',
    'label' => '',
    'rules' => 'trim|required'
  ),

  array(

  'field' => 'message',
  'label' => 'Message',
  'rules' => 'trim|required'
  ),



  );


    $this->form_validation->set_rules($config);
    $this->form_validation->set_error_delimiters('', '');

    if($this->form_validation->run() === FALSE){


      $result['error'] = true;
      $result['msg'] = array(


        'receiver_conn_id' => form_error('receiver_conn_id'),




        'message' => form_error('message'),






    );

    }

    else{

      $messages = array(


        'receiver_conn_id' => $this->input->post('receiver_conn_id'),
        'sender_conn_id' => $user->conn_id,
        'chat_id' => $this->chat_id(),
        'message' => $this->input->post('message'),
        'date' => Date('Y-m-d h:i:s')

      );


    $data = array(



    	'receiver_conn_id' => $this->input->post('receiver_conn_id'),
      'sender_conn_id' => $user->conn_id,
      'chat_id' => $messages['chat_id'],
      'messages' => json_encode($messages)


    );

      $studentMessage = $this->chat->createStudentMessage();

    if( $test  = $studentMessage->create($data['sender_conn_id'], $data['receiver_conn_id'], $data)) {

      $result['error'] = false;
      $result['msg'] = 'message added successfully';
    }




    else{

    	$result['error'] = true;
    	$result['msg'] = 'Data creation failed';

    }


    }

    echo json_encode($test);
  }
}
}
