<html>
    <head>
        <title>Q5</title>
    </head>
    <style>
        .error{
            color:red;
        }
        .content{
        display: flex;
        margin: 1rem;
        width: 600px;
        position: relative;
        }
       .lable{
        width: 200px;
       }
       .x{
        position: absolute;
        right: 0;

       }
        </style>
    <body>
        <div class="container">
            <form method=post>
                <div class="content">
                    <div class="lable"><label>Name<span class="error">*</span></label></div>
                    <input type="text" name="name" value="<?php 
        if(isset($_POST['submit'])){
            echo $_POST['name'];
        }
        ?>">
        <span class="error x">
            <?php
            if(isset($_POST['submit'])){
                if(empty($_POST['name'])){
                    echo "Required";
                }
            }
            ?>
        </span>
                </div>
                <div class="content">
                    <div class="lable"><label>Password<span class="error">*</span></label></div>
                    <input type="password" name="password" value="<?php 
        if(isset($_POST['submit'])){
            echo $_POST['password'];
        }
        ?>">
        <span class="error x">
            <?php
            if(isset($_POST['submit'])){
                if(empty($_POST['password'])){
                    echo "Required";
                }
                else if(strlen($_POST['password'])<5){
                    echo "Too short";
                }
            }
            ?>
        </span>
                </div>
                <div class="content">
                    <div class="lable"><label>Gender<span class="error">*</span></label></div>
                    <input type="radio" name="gender" value="male"<?php 
        if(isset($_POST['submit']) && !empty($_POST['gender'])){
            if($_POST['gender']=="male"){
                echo "checked";
            };
        }
        ?>>Male
         <input type="radio" name="gender" value="female"<?php 
        if(isset($_POST['submit']) && !empty($_POST['gender'])){
            if($_POST['gender']=="female"){
                echo "checked";
            };
        }
        ?>>Female
        <span class="error x">
            <?php
            if(isset($_POST['submit'])){
                if(empty($_POST['gender'])){
                    echo "Required";
                }
            }
            ?>
        </span>
                </div>
                <div class="content">
                <?php
                  $months = array(
                    'January', 'February', 'March', 'April', 'May', 'June', 
                    'July', 'August', 'September', 'October', 'November', 'December'
                );
                ?>
                    <div class="lable"><label>Date of Birth<span class="error">*</span></label></div>
                    <select name="date">
                    <option value="date">Date</option>
                        <?php
                        for($i=1;$i<=31;$i++)
                        {

                            echo "<option value={$i} ".check($i,$_POST['date']).">{$i}</option>";
                        } 
                        ?>
                    </select>
                    <select name="month">
                    <option value="month">Month</option>
                    <?php
                    foreach ($months as $index => $month) {
                echo "<option value=". ($index + 1)." ".check($index+1,$_POST['month']).">".$month."</option>";
            }
            ?>                   
             </select>
             <?php
             $yearcla=date('Y');
             ?>
             <select name="year">
             <option value="year">year</option>
                <?php
                for($i=$yearcla;$i>$yearcla-100;$i--){
                    echo "<option value={$i} ".check($i,$_POST['year']).">{$i}</option>";
                } 
                ?>
             </select>
        <span class="error x">
            <?php
            if(isset($_POST['submit'])){
                if(($_POST['date']=='date' ||$_POST['month']=='month') || $_POST['year']=='year')  {
                    echo "Required";
                }
            }
            ?>
        </span>
                </div>


                <div class="content">
                    <div class="lable"><label>Education<span class="error">*</span></label></div>
                    <input type="checkbox" name="education[]" value="UG"<?php 
        if(isset($_POST['submit'])&& !empty($_POST['education'])){
            if(in_array("UG",$_POST['education'])){
                echo "checked";
            };
        }
        ?>>UG
         <input type="checkbox" name="education[]" value="PG"<?php 
        if(isset($_POST['submit']) && !empty($_POST['education'])){
            if(in_array("PG",$_POST['education'])){
                echo "checked";
            };
        }
        ?>>PG
        <input type="checkbox" name="education[]" value="Professional"<?php 
        if(isset($_POST['submit']) && !empty($_POST['education'])){
            if(in_array("Professional",$_POST['education'])){
                echo "checked";
            };
        }
        ?>>Professional
        <span class="error x">
            <?php
            if(isset($_POST['submit'])){
                if(empty($_POST['education'])){
                    echo "Required";
                }
            }
            ?>
        </span>
                </div>



                <div class="content">
        <div class="lable"><label>Email<span class="error">*</span></label></div>
        <input type="email" name="email" value="<?php 
        if(isset($_POST['submit'])){
            echo $_POST['email'];
        }
        ?>">
        <span class="error x">
            <?php
            if(isset($_POST['submit'])){
                if(empty($_POST['email'])){
                    echo "Required";
                }
            }
            ?>
        </span>
                </div>
                <div class="content">
                    <input type="submit" name="submit" >
                </div>
            </form>
        </div>
       
        <?php
      function check($a,$b){
        if(isset($_POST['submit'])){
            if($a == $b){
                return 'selected';
            }
        }
      }
      ?>
      <?php 
      if(isset($_POST['submit']) && !empty($_POST['email']) && !empty($_POST['education']) && $_POST['date']!='date' &&$_POST['month']!='month' && $_POST['year']!='year' && !empty($_POST['gender']) && !empty($_POST['name']) && !empty($_POST['password'])){
        echo "<div class='y'>Name : {$_POST['name']}<br>";
        echo "<div class='y'>Password : {$_POST['password']}<br>";
        echo "<div class='y'>Gender : {$_POST['gender']}<br>";
        echo "<div class='y'>Date of birth : ". sprintf('%02d/%02d/%04d', $_POST['date'],$_POST['month'],$_POST['year'])."<br>";
        echo "<div class='y'> Education : ";
        foreach($_POST['education'] as $x){
            echo "{$x}  ";
        }
        echo "<br>";
        echo "<div class='y'>Eamil : {$_POST['email']}<br>";

      }
      ?>
    </body>
</html>