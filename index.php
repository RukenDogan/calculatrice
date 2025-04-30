<?php
$calcul = $_GET['calcul'] ?? '';
$result = '';

if (preg_match('/^[0-9\.\+\-\*\/ ]+$/', $calcul)) {
    try {
        $result = eval ("return $calcul;");
    } catch (Throwable $e) {
        $result = "Erreur";
    }
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
</head>

<body>
    <div class="calculator">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <form action="" method="get" class="row">
                        <div class="row">
                            <div class="col-12" style="height: 25px;">
                                <div class="col-1"> </div>
                                <div class="col-10"> </div>
                                <div class="row bg-grey">
                                    <div class="col-12">
                                        <div class="row" style="background-color: #D0E0E3">
                                            <div class="col">
                                            </div>
                                            <input type="text" name="calcul" id="calcul"
                                                value="<?= htmlspecialchars($calcul ?? '') ?>">


                                            <?php if (isset($result)): ?>
                                                <div class="col text-end" id="result">
                                                    <h1><?= $result ?></h1>
                                                </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="col-1"></div>
                                    <div class="col-12" style="height: 25px;"></div>
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-2"><button type="button" onclick="sendKey(7)">7</button>
                                            </div>
                                            <div class="col-2"><button type="button" onclick="sendKey(8)">8</button>
                                            </div>
                                            <div class="col-2"><button type="button" onclick="sendKey(9)">9</button>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-2"><button type="button" onclick="sendKeyCE()">CE</button>
                                            </div>
                                            <div class="col-2"><button onclick="sendKeyC()">C</button></div>
                                            <div class="col-12" style="height: 15px;"></div>

                                            <div class="col-2"><button type="button" onclick="sendKey(4)">4</button>
                                            </div>
                                            <div class="col-2"><button type="button" onclick="sendKey(5)">5</button>
                                            </div>
                                            <div class="col-2"><button type="button" onclick="sendKey(6)">6</button>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-2"><button type="button" onclick="sendKey('/')">÷</button>
                                            </div>
                                            <div class="col-2"><button type="button" onclick="sendKey('*')">x</button>
                                            </div>

                                            <div class="col-12" style="height: 15px;"></div>

                                            <div class="col-2"><button type="button" onclick="sendKey(3)">3</button>
                                            </div>
                                            <div class="col-2"><button type="button" onclick="sendKey(2)">2</button>
                                            </div>
                                            <div class="col-2"><button type="button" onclick="sendKey(1)">1</button>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-2"><button type="button" onclick="sendKey('-')">-</button>
                                            </div>
                                            <div class="col-2"><button type="button" onclick="sendKey('+')">+</button>
                                            </div>

                                            <div class="col-12" style="height: 15px;"></div>

                                            <div class="col-3"><button type="button" onclick="sendKey(0)">0</button>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-2"><button type="button" onclick="sendKey('.')">.</button>
                                            </div>
                                            <div class="col-1"></div>
                                            <div class="col-3"><button type="submit">=</button></div>

                                            <div class="col-12" style="height: 25px;"></div>
                                        </div>
                                    </div>
                                </div> <!-- .row.bg-grey -->
                            </div> <!-- .col-12 (principale) -->
                        </div> <!-- .row (interne) -->
                    </form>
                </div> <!-- .col-4 -->
            </div> <!-- .row -->
        </div> <!-- .container -->
    </div> <!-- .calculator -->

    <script>

        function sendKey(keysend) {
            document.getElementById("calcul").value += keysend;
        }

        function sendKeyCE() {
            document.getElementById("calcul").value = "";
        }

        function sendKeyC() {
            document.getElementById("calcul").value = "";
            const resultDiv = document.getElementById("result");
            if (resultDiv) {
                resultDiv.innerHTML = "";
            }
        }

    </script>
</body>

</html>

