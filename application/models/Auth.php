<?php 
class Auth extends CI_Model 
{
	
	public function __construct()
	{
        parent::__construct();
	}
 
	function register($username,$password,$name,$email,$role)
	{
		$data_user = array(
			'username'=>$username,
			'password'=>password_hash($password,PASSWORD_DEFAULT),
			'name'=>$name,
			'email'=>$email,
			'role'=>$role
		);
		$this->db->insert('master_profile',$data_user);
	}

	function login_user($username,$password)
	{
        $query = $this->db->get_where('master_profile',array('username'=>$username));
        if($query->num_rows() > 0)
        {
            $data_user = $query->row();
            if (password_verify($password, $data_user->password)) {
                $this->session->set_userdata('id',$data_user->id);
                $this->session->set_userdata('username',$username);
				$this->session->set_userdata('name',$data_user->name);
				$this->session->set_userdata('role',$data_user->role);
				$this->session->set_userdata('is_login',TRUE);
                return TRUE;
            } else {
                return FALSE;
            }
        }
        else
        {
            return FALSE;
        }
	}
	
    function check_login()
    {
        if(empty($this->session->userdata('is_login')))
        {
			redirect('logincontroller');
		}
    }

    function edit($id,$password,$name,$email,$role)
	{
		if ($password == "") {
			$this->db->set('name', $name);
			$this->db->set('email', $email);
			$this->db->set('role', $role);
			$this->db->where('id', $id);
			$result=$this->db->update('master_profile');
			redirect('homecontroller');
		} else {
			$this->db->set('name', $name);
			$this->db->set('email', $email);
			$this->db->set('role', $role);
			$this->db->set('password', password_hash($password,PASSWORD_DEFAULT));
			$this->db->where('id', $id);
			$result=$this->db->update('master_profile');
			redirect('homecontroller');
		}
	}
}