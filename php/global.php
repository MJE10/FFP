<style>
    html, body {
        padding: 0;
        margin: 0;
        background-color: #49d188;
    }

    * {
        font-family: 'Montserrat', sans-serif;
        
    }

    body {
        text-align: center;
        padding-bottom: 100px;
    }

    h1 {
        font-size: 26px;
        font-weight: 700;
        margin: 0;
    }

    h2 {
        font-size: 18px;
        font-weight: 500;
        margin: 0;
    }

    .shadowBoxClass {
        display: inline-flex;
        flex-direction: column;
        align-items: center;
        max-width: calc(100% - 80px);
        margin: 20px;
        padding: 10px;
        border-radius: 5px;
        background-color: rgb(255, 255, 255);
        box-shadow: 0 3px 5px rgba(0,0,0,.18);
    }

    .orangeButton {
        font-size: 18;
        padding: 5px 25px 5px 25px;
        background-color: #ff8000;
        border-radius: 5px;
        color: white;
        border: none;

        transition: .2s all;
        box-shadow: 0 4px 0 rgba(0,0,0,.6);
    }

    .orangeButton:hover {
        background-color: #ad5700;
        color: #f0f0f0;
        transform: translateY(2px);
        box-shadow: 0 2px 0 rgba(0,0,0,.6);
    }

    .orangeButton:active {
        background-color: #ad5700;
        color: #f0f0f0;
        transform: translateY(3px);
        box-shadow: 0 0px 0 rgba(0,0,0,.6);
    }

    .orangeButton h2 {
        font-weight: 600;
        margin: 0;
    }
</style>