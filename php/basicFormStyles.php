<style>

        body {
            background-color: #49d188;
            text-align: center;
        }

        #formDiv {
            background-color: white;
            border-radius: 8px;
            display: inline-block;
            padding: 10px;
            margin-top: 20px;
        }

        h2, input {
            display: block;
            margin: 7.5px 0px 7.5px 0px;
        }

        input {
            width: 20em;
        }

        .submitButton {
            padding: 8px;
            border: 1px solid black;
            border-radius: 2px;
            margin-top: 7.5px;
        }

        .submitButton h2 {
            margin: 0;
        }

        #inputsDiv {
            margin-left: 10px;
        }

        #allRowDivs {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Portrait */
        @media screen and (orientation:landscape) {
            .rowDiv * {
                display: inline-block;
                margin-left: 10px;
            }
            .rowDiv h2 {
                width: 10em;
                text-align: right;
            }
        }
    </style>