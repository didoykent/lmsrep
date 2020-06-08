<?php

require APPPATH . '/models/Chat/MessageInterface.php';




class StudentMessage  extends  CI_Model implements MessageInterface  {








  public function create($sender, $receiver, $message){


      $previousMessages = $this->get($sender, $receiver) ?  $this->get($sender, $receiver)[0] : '';





      if($previousMessages){

        $previous  = json_decode($previousMessages->messages, true);
        $previous[] = $message['messages'];

        $updateMessage =  array(

          'messages' =>   json_encode($previous)


        );


          return  $this->update($sender, $receiver, $updateMessage);

        }

        else{

          $newArray = array();

          $newArray[] = $message['messages'];

          $message['messages'] = json_encode($newArray);



          return    $this->db->insert('message', $message);
        }




  }







  public function update($sender, $receiver , $message){


$this->db->where('sender_conn_id', $sender)->where('receiver_conn_id', $receiver);
    $this->db->update('message', $message);
    if($this->db->affected_rows() > 0){

      return true;
    }

    else{

      return false;
    }
  }


  public function get($sender, $receiver){


    $this->db->where('sender_conn_id', $sender)->where('receiver_conn_id', $receiver);
    $query = $this->db->get('message');
    if($query->num_rows() > 0){

      return $query->result();
    }

    else{

      return false;
    }



  }



}
