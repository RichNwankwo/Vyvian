<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">

    <title>Vyvian</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/react/0.14.0/react.min.js"></script>
    <script src="http://fb.me/JSXTransformer-0.12.2.js"></script>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

    <style>
        html, body {
            height: 100%;
        }

        body {
            margin: 0;
            padding: 0;
            width: 100%;
            display: table;
            font-weight: 900;
            font-family: 'Lato';
            background-color: #FAFAFA;
        }

        .container {
            text-align: center;
            display: table-cell;
            vertical-align: middle;
        }

        .content {
            text-align: center;
            display: inline-block;
        }

        .question {
            /*font-size: 66px;*/
            margin: 15px;
        }

        .subMenu{
            display: inline;
            margin: 15px;
            font-size: 32px;
        }

        .subMenuContainer{
            margin: 80px;
        }

        .subMenu:hover{
            color: #FF9800
        }

        #mainQuestion{
            font-size: 30px;
        }

        .subQuestion{
            font-weight: 500;
            font-style: italic;
            font-size: 16px;
        }
        .answer textarea{
            border: none;
            background-color: #FAFAFA;
            width: 100%;
            outline: 0;
            text-align: center;
            font-size: 20px;
            font-family: lato;
        }

        .answer{
            margin: 40px;

        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
        <section id="question" class="question">
            <p id="mainQuestion"></p>
            <p id="subQuestion" class="subQuestion"> Examples: I want to Lose Weight. I want to Stop Smoking</p>
        </section>
        <section class="answer">
            <form action="">
                <textarea  rows="3" name="answer"></textarea>
                <i style="float: right" class="fa fa-arrow-right"></i>
            </form>
        </section>
    </div>
</div>

</body>
<script type="text/jsx">

    var SNF = React.createClass({

        getDefaultProps: function(){
            return {strings: ["Are you lost?", "Need help?", "Looking for something?"]}
        },

        getInitialState: function(){
            return {
                string: this.props.strings[0]
            };
        },
//
        after: function(){
            var currentPlace = this.props.questions.indexOf(this.state.question);
            var newPlace = currentPlace;
            currentPlace + 1 < this.props.questions.length ?  newPlace = currentPlace + 1 : newPlace = currentPlace;
            this.setState({
                question: this.props.questions[newPlace]
            });
        },
//
        before: function(){
            var currentPlace = this.props.questions.indexOf(this.state.question);
            var newPlace = currentPlace;
            currentPlace - 1 > -1 ?  newPlace = currentPlace - 1 : newPlace = currentPlace;
            this.setState({
                question: this.props.questions[newPlace]
            });
        },


        render: function(){
            return <p>{this.state.string}</p>
        }

    });


    // TODO does not work. Need to fix when working on front end.
    var ActionButton = React.createClass({

        getDefaultProps: function(){
            return {strings: ["Are you lost?", "Need help?", "Looking for something?"]}
        },

        getInitialState: function(){
            return {
                string: this.props.strings[0]
            };
        },


        render: function(){
            <h1>{this.state.string}</h1>
        }
    });


    React.render(<SNF strings={['What is your goal?','Can you narrow it to a specific behavior?']}/>, document.getElementById('mainQuestion'));
    React.render(<SNF />, document.getElementById('subQuestion'));
    React.render(<ActionButton />, document.getElementById('actionButtons'));
</script>
</html>
