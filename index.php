<?php

const FORM_IS_SUBMITTED      = 'FORM_IS_SUBMITTED';
const FORM_LABELS            = 'FORM_LABELS';
const FORM_NAME              = 'FORM_NAME';
const FORM_VALIDATION_ERRORS = 'FORM_VALIDATION_ERRORS';
const FORM_VALIDATION_RULES  = 'FORM_VALIDATION_RULES';

const VALIDATION_ERROR_ALPHA      = 'Het invulveld \'%s\' mag enkel alfabetische tekens bevatten.';
const VALIDATION_ERROR_EMAIL      = 'Het invulveld \'%s\' moet een geldig e-mailadres zijn.';
const VALIDATION_ERROR_IDENTICAL  = 'Het invulveld \'%s\' moet identiek zijn aan veld \'%s\'.';
const VALIDATION_ERROR_INTEGER    = 'Het invulveld \'%s\' moet een geheel getal zijn.';
const VALIDATION_ERROR_LENGTH_MAX = 'Het invulveld \'%s\' mag maximaal %d tekens bevatten.';
const VALIDATION_ERROR_LENGTH_MIN = 'Het invulveld \'%s\' moet minstens %d tekens bevatten.';
const VALIDATION_ERROR_REQUIRED   = 'Vul het invulveld \'%s\' in.';
const VALIDATION_ERROR_UNKNOWN    = 'Validatieregel is onbekend.';

const VALIDATION_RULE_ALPHA      = 'VALIDATION_RULE_ALPHA';
const VALIDATION_RULE_EMAIL      = 'VALIDATION_RULE_EMAIL';
const VALIDATION_RULE_IDENTICAL  = 'VALIDATION_RULE_IDENTICAL';
const VALIDATION_RULE_INTEGER    = 'VALIDATION_RULE_INTEGER';
const VALIDATION_RULE_LENGTH_MAX = 'VALIDATION_RULE_LENGTH_MAX';
const VALIDATION_RULE_LENGTH_MIN = 'VALIDATION_RULE_LENGTH_MIN';
const VALIDATION_RULE_REQUIRED   = 'VALIDATION_RULE_REQUIRED';

$formRegistration = [
    FORM_IS_SUBMITTED => false,
    FORM_LABELS => [
        'id-number' => 'ID-nummer',
        'username' => 'gebruikersnaam',
        'email' => 'e-mailadres',
        'password' => 'wachtwoord',
        'password-confirm' => 'wachtwoord bevestigen'
    ],
    FORM_NAME => 'form-registration',
    FORM_VALIDATION_ERRORS => [],
    FORM_VALIDATION_RULES => [
        'id-number' => [
            VALIDATION_RULE_REQUIRED,
            VALIDATION_RULE_INTEGER,
            [VALIDATION_RULE_LENGTH_MIN => 6],
        ],
        'username' => [
            VALIDATION_RULE_ALPHA,
            [VALIDATION_RULE_LENGTH_MIN =>  8],
            [VALIDATION_RULE_LENGTH_MAX => 12],
        ],
        'email' => [
            VALIDATION_RULE_REQUIRED,
            VALIDATION_RULE_EMAIL,
        ],
        'password' => [
            VALIDATION_RULE_REQUIRED,
            [VALIDATION_RULE_IDENTICAL => 'password-confirm'],
        ],
        'password-confirm' => [
            VALIDATION_RULE_REQUIRED,
            [VALIDATION_RULE_IDENTICAL => 'password'],
        ],
    ],
];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $idnumber = $_POST["id-number"];
    $idnumber = $_POST["username"];
    $idnumber = $_POST["pasword"];
    $idnumber = $_POST["comfirmPasword"];

}

function VALIDATION_RULE_REQUIRED($id){
   echo $id;
    if(!isset($id)){
        return VALIDATION_RULE_REQUIRED;
    }
};


?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
        crossorigin="anonymous">
    <title>for validation</title>
</head>

<body>
    <div class="container">
            <form action="" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                <div class="row form-group">
                    <label for="input-id">Wat is je ID nummer?</label>
                    <input class="form-control" id="input-id" type="text" name="id-number">
                  <p><?php  var_dump( $formRegistration[FORM_VALIDATION_RULES]['id-number'][0]);?></p>

                <div class="row">
                    <label for="username">Wat is je username?</label>
                    <input class="form-control" id="input-id" type="text" name="username">
                </div>
                <div class="row">
                    <label for="pasword">Wat is je paswoord?</label>
                    <input class="form-control" id="input-id" type="text" name="pasword">
                </div>
                <div class="row">
                    <label for="comfirmPasword"> comfirm pasword?</label>
                    <input class="form-control" id="input-id" type="text" name="comfirmPasword">
                </div>


                <div class="row">
                        <input class="btn btn-primary" type="submit" value="verzenden" name="submit">
                </div>


                
                </div>
            </form>
        </div>
    </body>

    </html>