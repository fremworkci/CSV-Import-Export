<?php
/**
 * 
 */
class Home extends CI_Controller
{
	
	function index()
	{
		$this->load->view('home2');
	}
	function csvupload()
	{
		$filename=$_FILES["file"]["tmp_name"];// temp file name
		if($_FILES["file"]["size"] > 0) //if file empity na ho
		{
			$file=fopen($filename, 'r');
			while(($getdata=fgetcsv($file,1000,","))!==FALSE)
			{
				$qry=$this->db->insert("employee",array('name'=>$getdata[1],'email'=>$getdata[2],'phone'=>$getdata[3],'status'=>$getdata[4]));
				$id=$this->db->insert_id();
				$qry=$this->db->insert("employee_department",array('emp_id'=>$id,'department_title'=>$getdata[5],'department_manager'=>$getdata[6]));
				// $id2=$this->db->insert_id();
				$qry=$this->db->insert("employee_address",array('emp_id'=>$id,'employee_postal_address'=>$getdata[7],'employee_permanent_address'=>$getdata[8]));
				
			}
		}
		redirect("Home");
	}
	
	<!-- -----------------------insert Unique recor or jo record match karega usko update kar dega----------------------- -->
	function csvupload()
	{
		$filename=$_FILES["file"]["tmp_name"];// temp file name
		if($_FILES["file"]["size"] > 0) //if file empity na ho
		{
			$file=fopen($filename, 'r');
			while(($getdata=fgetcsv($file,1000,","))!==FALSE)
			{
				$email=$getdata['2'];
				$qry1=$this->StudentModel->check($email);
				if($qry1  >0)
				{
					$this->db->where("email",$email);
					$updateqry=$this->db->update("student",array('name'=>$getdata[1],'email'=>$getdata[2],'password'=>$getdata[3],'mobile'=>$getdata[4]));
				}
				else
				{
					$qry=$this->db->insert("student",array('name'=>$getdata[1],'email'=>$getdata[2],'password'=>$getdata[3],'mobile'=>$getdata[4]));
				}
			}

		}
		redirect("StudentController/profile");
	}	
	<!-- ----------------------- End insert Unique recor or jo record match karega usko update kar dega----------------------- -->		


	function export()
	{
		$qry=$this->Model1->export_model();
		$output="<table style='border:1px solid red;'>";
		foreach($qry as $row)
		{
			$output.="
				<tr>
				<td>".$row->name."</td>
				<td>".$row->email."</td>
				<td>".$row->password."</td>
				</tr>
			";
		}
		$output.="</table>";
		header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="feedback Data.xls"');
		// header("Content-Type : application/xls");
		// header("Content-Dispositon : attachment; filename=data.xls");
		echo $output;
	}
	
}
?>
