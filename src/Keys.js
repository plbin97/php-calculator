
exports.key = [ // Define the values for buttons
    ["(",")","√","%"],
    ["7","8","9","/"],
    ["4","5","6","*"],
    ["1","2","3","-"],
    [".","0","^","+"]
];


let insertTextAtCursor = require('./insertTextAtCursor').insert;

exports.FunctionsForKeys = [  // Define the function for each button.

    [
        ()=>{
            // Button (
            insertTextAtCursor("(");
        },
        ()=>{
            // Button )
            insertTextAtCursor(")");
        },
        ()=>{
            // Button √
            insertTextAtCursor("√");
        },
        ()=>{
            // Button %
            insertTextAtCursor("%");
        }
    ],
    [
        ()=>{
            // Button 7
            insertTextAtCursor("7");
        },
        ()=>{
            // Button 8
            insertTextAtCursor("8");
        },
        ()=>{
            // Button 9
            insertTextAtCursor("9");
        },
        ()=>{
            // Button /
            insertTextAtCursor("/");
        }
    ],
    [
        ()=>{
            // Button 4
            insertTextAtCursor("4");
        },
        ()=>{
            // Button 5
            insertTextAtCursor("5");
        },
        ()=>{
            // Button 6
            insertTextAtCursor("6");
        },
        ()=>{
            // Button *
            insertTextAtCursor("*");
        }
    ],
    [
        ()=>{
            // Button 1
            insertTextAtCursor("1");
        },
        ()=>{
            // Button 2
            insertTextAtCursor("2");
        },
        ()=>{
            // Button 3
            insertTextAtCursor("3");
        },
        ()=>{
            // Button -
            insertTextAtCursor("-");
        }
    ],
    [
        ()=>{
            // Button .
            insertTextAtCursor(".");
        },
        ()=>{
            // Button 0
            insertTextAtCursor("0");
        },
        ()=>{
            // Button ^
            insertTextAtCursor("^");
        },
        ()=>{
            // Button +
            insertTextAtCursor("+");
        }
    ]
];