<?php
include'../Faculty/headerF.php';
?>
<div class="col-lg-7">
    <!-- <div class="col-th-lg" -->
    <div class="card">
        <div class="card-header">
            <strong class="card-title">Exam Category</strong>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th scope="col">1</th>
                        <th scope="col" colspan="4">Exam</th>
                    </tr>
                </thead>
            </table>
            <table>
                <tbody>
                    
                    <tr>
                    <th scope="row">coun</th>
                    <td> echo $row['Subject']; ee</td>
                    <td>pp echo $row['exam_time_min']; ee</td>
                    <td><a href="edit_subject.php?subid=pp echo$row['sub_id'] ee">Edit</a></td>
                    <td><a href="delete_subject.php?subid=pp echo$row['sub_id'] ee"style="color:red;">Delete</a></td>
                    </tr>
                        
                    pp

                    }
                    ee
                </tbody>
            </table><b>Note:</b> If you click on delete link the subject will deleted without any conformation
        </div>
    </div> 
</div>