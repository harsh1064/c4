<?php

namespace App\Controllers;
use App\Models\User;

class Pages extends BaseController
{
    public function index()
    {
        echo view('Templates/header.php');
        echo view('Pages/home.php');
        echo view('Templates/footer.php');

        //echo "These is default method for pages controller";
    }

    public function showMe($page = 'Home')
     {
         if(!is_file(APPPATH.'/Views/Pages/'.$page.'.php')){

            throw new \CodeIgniter\Exceptions\PageNotFoundException($page);
            
         }

            echo view('Templates/header');
            echo view('Pages/'.$page);
            echo view('Templates/footer');
            //echo "This is $pages";
    }

    public function insert() {

        $validation = \Config\Services::validation();
        $rules = $this->validate([
            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required|valid_email|is_unique[user.email]',
            'password'=>'required|min_length[8]',
        ]);

        if(!$rules) {
            $data['validation'] = $this->validator;
            return view('Pages/register',$data);

        }
        else {

            $file=$this->request->getFile('pic');
            $fname = $file->getName();
            $tname = $file->getTempName();
            $fSize = $file->getSize();
           // echo $file->getMimeType();
            $fExt = $file->guessExtension();
            $newName = $file->getRandomName();

            $file->move('../upload',$newName);


            $data = ['fname'=>$this->request->getVar('fname'),
                     'lname'=>$this->request->getVar('lname'),
                     'email'=>$this->request->getVar('email'),
                     'password'=>$this->request->getVar('password'),
                    'pic'=>$newName];

            $user = new User();
            $user->insert($data);
            $data['user'] = $user->findAll();
            return view("Pages/list",$data);
        }


        //Request Class

        // $data = ['fname'=>$this->request->getVar('fname'),
        //          'lname'=>$this->request->getVar('lname'),
        //          'email'=>$this->request->getVar('email'),
        //          'password'=>$this->request->getVar('password')];

        // /*query builder

        // $db = \config\Database::connect();
        // $qry = $db->table('user');
        // $qry->insert($data); */

        // $model = new User();
        // $model->insert($data);

        // echo "This is Add";
    }



    public function data() {
        // // $data = new User();
        // $user = new User();
        // $data['user'] = $user->findAll();
        // return view("Pages/list",$data);
        // // print_r($data->findAll());

        $session = session();
        if(isset($session->uname)){
            $user = new User();
            $data['user'] = $user->findAll();
            return view("Pages/list",$data);
        }else{
            return redirect()->to("http://blog/login");
        }

    }


    public function edit($id) {
        // echo "This is edit method $id";
        $user = new User();
       $data['user'] = $user->where('id',$id)->first();
       return view("Pages/edit",$data);

    }

    public function update() {

        // echo "This is update";
        
          $user = new User();
          $id = $this->request->getVar('id');

        $data = ['fname'=>$this->request->getVar('fname'),
        'lname'=>$this->request->getVar('lname'),
        'email'=>$this->request->getVar('email'),
        'password'=>$this->request->getVar('password')];

        $user->update($id,$data);
        return redirect()->to("http://blog/data");
    }

    public function login() {

        $session = session();

        // echo "This is login";
        $user = new User();
        $res = $user->where('email',$this->request->getVar('email'))->
                      where('password',$this->request->getVar('password'))->first();

        if($res != null){
            $session->set('uname',$res['fname']);
            $user = new User();
            $data['user'] = $user->findAll();
            echo view("Pages/list",$data);

            return view("Pages/button");

               // echo "<h3> Welcome user ".$res['fname'];
            
        }
            else{
                return view("Pages/login");
        
            }
        
        
    }

    public function logout() {
        $session = session();

        $user = new User();

        $session->destroy($session->uname);

        return redirect()->to("http://blog/login");

    }
}
