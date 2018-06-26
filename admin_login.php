<?php

	include "header2.php"

?>


<div class="main-page-title"><!-- start main page title -->
    <div class="container">
<div class="row col-md-4" style="background-color:white;padding-top:10px;">
                        <form method="post" action="#">
                            <table class="table">
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="email">Email Address</label>
                                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
                                         </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="cell_phone">Cell Phone</label>
                                            <input type="cell_phone" class="form-control" id="cell_phone" name="cell_phone" placeholder="Example: 01711XXXXX">
                                         </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                                         </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" class='btn btn-warning'><span class='fa fa-sign-in'></span>Login</button>
                                        <button type="submit" class='btn btn-danger'><span class='fa fa-edit'></span>Forget Password</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="text-align:center;font-weight:bold;"></td>
                                </tr>
                                
                            </table>
                        </form>
                    </div>
    </div>
</div>




<?php

	include "footer.php"

?>
