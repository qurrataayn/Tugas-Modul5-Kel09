<?php
class userService
{
    protected $email;    // using protected so they can be accessed
    protected $password; // and overidden if necessary
    protected $dataUser; // dummy data
	protected $history;
    protected $getRole;  // stores the role data
	protected $getData1;
	protected $getData2;

    public function __construct($email, $password) 
    {
        $this->_dataUser = [
            (object) [
                'email'     => "ayunkelompok09@gmail.com",
                'password'  => "19140123",
                'role'      => "superadmin"
            ],
            (object) [
                'email'     => "akbarkelompok09@gmail.com",
                'password'  => "19120029",
                'role'      => "user"
            ]
        ];
        $this->history = [
            (object)[
                'email'            => "ayunkelompok09@gmail.com",
                'peminjaman_buku'  => 'Kalkulus'. '<br>Konsep Jaringan Komputer'. '<br>Struktur Data',
                'tanggal_pinjam'   => "26-04-2020"
            ],
            (object)[
                'email'            => "akbarkelompok09@gmail.com",
                'peminjaman_buku'  => 'Kalkulus'. '<br>Bahasa Pemrograman',
                'tanggal_pinjam'   => "26-04-2020"
            ]
        ];
       $this->email = $email;
       $this->password = $password;
    }

    public function login(){
        $user = $this->checkCredentials();
        if($user) {
            $this->getRole = $user->role;
            return $get_data = $user->email;
        } else {
            return false;
        }		
    }
	public function login1(){
		$data1 = $this->checkCredentials1();
        if($data1) {
            $this->getData1 = $data1->peminjaman_buku;
			$this->getData2 = $data1->tanggal_pinjam;
            return $get_data = $data1->email;
        } else {
            return false;
        }
	}
	

    protected function checkCredentials(){
        foreach($this->_dataUser as $key => $value) {
            if($value->email == $this->email && $value->password == $this->password) {
                return $value;
            }
        }
        return false;
    }
	
	protected function checkCredentials1(){
        foreach($this->history as $key => $value) {
            if($value->email == $this->email) {
                return $value;
            }
        }
        return false;
    }
	
    public function getRole(){
        return $this->getRole;
    }
	
	public function getData1(){
		return $this->getData1;
	}

	public function getData2(){
		return $this->getData2;
	}
}
?>
