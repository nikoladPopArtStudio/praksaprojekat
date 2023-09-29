    <?php include 'includes/header.php'; ?>


    <div class="loader"></div>
    <div class="main container">
        <div class="row">
            <div class="col-md-6">
                <ul class='parent list-group'>
                    <div class="row target_row">
                        <?php
                        $students = $res->fetchAll();
                        foreach($students as $student)
                        {
                        ?>
                        <li class='col-md-6'> 
                            <ul>
                                <li class='list-group-item' >Index: <span class='studentId '><?php echo $student['student_id']; ?></span></li>
                                <li class="list-group-item" >Ime i Prezime: <?php echo $student['Ime'] . ' ' . $student['Prezime']; ?></li>
                                <li class="list-group-item">Prosecna Ocena: <?php echo $student['Ocena']; ?></li>
                                <button class='deleteButton btn btn-danger' type="submit">Obrisi Studenta</button>
                            </ul>
                        </li>
                        <?php } ?>
                    </div>
                </ul>
            </div>
            <div class="col-md-6">
                <form id='studentForm' name='studentForm' action="create.php"  onsubmit="return required(event);" method='POST'>
                    <div class="form-group">
                        <label for="ime">Ime: </label>
                        <input class='field form-control' type="text" name='ime' value=''>
                    </div>
                
                    <div class="form-group">
                        <label for="ime">Prezime: </label>
                        <input class='field form-control' type="text" name='prezime' value=''>
                    </div>
                
                    <div class="form-group">
                        <label for="ime">Ocena: </label>
                        <input class='field form-control' type="number" name="ocena" value='' step=".01">
                    </div>
                    <input class="btn btn-primary" type="submit" value='Unesi Studenta' ></input>
                </form>
            </div>
        </div>
    </div>

    <?php include 'includes/footer.php'; ?>
