<?php include 'header.inc.php'; ?>

   <!-- quizbody starts -->
   <div class="container-fluid mt-5 " id="quizBody">
        <h1 class="text-center">Add Contents</h1>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="col-5 m-auto">
                    <div class="form-container">
                        
                        <form action="insert-content.php" method="post" enctype="multipart/form-data">
                            <div class="form-group my-3">
                                <input name="title" type="text" placeholder="Enter Video Title" class="form-control" required>
                            </div>
                            <div class="form-group my-3">
                                <input type="text" name="desc" class="form-control" placeholder="Enter Description">
                            </div>
                            <div class="form-group my-3">
                            <label for="" class="form-label text-dark">Choose Video</label>
                                <input accept=".mp4" placeholder="Select video" type="file" name="video_name" class="form-control" required>
                            </div>
                            <div class="form-group my-3">
                                <label for="" class="form-label text-dark">Choose PDF's</label>
                                <input accept=".pdf"  type="file" name="pdf_details" class="form-control" required>
                            </div>
                            <button type='submit' id='add' name="add" class="btn btn-primary w-100">Add</button>
                        </form>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.inc.php'; ?>