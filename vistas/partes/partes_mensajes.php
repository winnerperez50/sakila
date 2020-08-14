<?php
if ( isset($error) && ! empty($error) ) {
    echo " <div class=\"alert alert-danger alert-dismissible fade show\" role=\"alert\">
<i class='fas fa-times'></i> {$error}
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
</button>
</div>";
}

if ( isset($mensaje) && ! empty($mensaje) ) {
    echo " <div class=\"alert alert-success alert-dismissible fade show\" role=\"alert\">
<i class='fas fa-check'></i> {$mensaje}
<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-label=\"Close\">
    <span aria-hidden=\"true\">&times;</span>
</button>
</div>";
}
?>
