<?php session_start() ?>
<?php require 'resources/users.php';?>
<?php include 'resources/templates/header.php'; ?>
<?php $user = unserialize($_SESSION['user']);?>
<div id="container">
    <section id="mainInfo" class="clearfix">
        <h1>Welcome<?php echo " $user->name" ?></h1>
        <div id="courses" class="centered float-left">
            <h2>Add a Course:</h2>
            <form id="addCourse" method="get" action="resources/formHandler2.php">
                <label>Course Name</label>
                <label>Credits</label>
                <label>Grade</label><br/>
                <input type="text" name="courseName" id="courseName" required>
                <input type="number" min="1" max="15" name="credits" id="credits" required>
                <input type="text" name="grade" id="grade" required>
                <br />
                <input type="submit" name="submit" value="Add Course">
            </form>
            <h2>View your Courses:</h2>
            <table>
                <?php if(isset($user->courses)){?>
                    <tr>
                        <th>Course</th>
                        <th>Credits</th>
                        <th>Grade</th>
                    </tr>
                    <?php foreach($user->courses as $course){?>
                    <tr>
                        <td><?php echo $course->name?></td>
                        <td><?php echo $course->credits?></td>
                        <td><?php echo $course->grade?></td>
                    </tr>
                    <?php }?>
                <?php }else{?>
                <tr>You can add your first course in the form up there!</tr>
                <?php } ?>
            </table>
        </div>
        <aside id="sideInfo" class="float-right">
            <h2>GPA</h2>
        </aside>
    </section>
    
</div>
<?php include 'resources/templates/footer.php'; ?>