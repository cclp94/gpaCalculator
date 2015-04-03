<?php session_start() ?>
<?php require 'resources/users.php';?>
<?php include 'resources/templates/header.php'; ?>
<?php $user = unserialize($_SESSION['user']);?>
<div id="container">
    <section id="mainInfo" class="clearfix">
        <h1>Welcome<?php echo " $user->name" ?></h1>
        <div id="courses" class="centered float-left">
            <h2>Add a Course:</h2>
            <form method="get" action="resources/formHandler.php">
                <table id="addCourse" class="centered-block">
                <tr>
                    <th><label for="courseName">Course Name</label></th>
                    <th><label for="credits">Credits</label></th>
                    <th><label for="grade">Grade</label></th>
                </tr>
                <tr>
                    <td><input type="text" name="courseName" id="courseName" required></td>
                    <td><input type="number" min="1" max="15" name="credits" id="credits" required></td>
                    <td><select name="grade" id="grade">
                          <option value="A+" selected>A+</option>
                          <option value="A">A</option>
                          <option value="A-">A-</option>
                          <option value="B+">B+</option>
                          <option value="B">B</option>
                          <option value="B-">B-</option>
                          <option value="C+">C+</option>
                          <option value="C">C</option>
                          <option value="C-">C-</option>
                          <option value="D+">D+</option>
                          <option value="D">D</option>
                          <option value="D-">D-</option>
                          <option value="F">F</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3"><input type="submit" name="submit" value="Add Course"></td>
                </tr>
                </table>
            </form>
            <h2>View your Courses:</h2>
            <table id="courses-table">
                <?php if(isset($user->courses)){?>
                    <tr>
                        <th>Course</th>
                        <th>Credits</th>
                        <th>Grade</th>
                    </tr>
                    <?php foreach($user->courses as $course){?>
                    <tr>
                        <td><?php echo $course->name;?></td>
                        <td><?php echo $course->credits;?></td>
                        <td><?php echo $course->grade;?></td>
                    </tr>
                    <?php }?>
                <?php }else{?>
                <tr>You can add your first course in the form up there!</tr>
                <?php } ?>
            </table>
        </div>
        <aside id="sideInfo" class="float-right centered">
            <h2>GPA</h2>
            <span class="meta centered-block"><?php echo calculateGPA($user->courses);?></span>
            <h2>Number of Courses</h2>
            <span class="meta centered-block"><?php echo getNumCourses($user->courses); ?></span>
            <h2>Total of Credits</h2>
            <span class="meta centered-block"><?php echo getNumCredits($user->courses); ?></span>
        </aside>
    </section>
    
</div>
<?php include 'resources/templates/footer.php'; ?>