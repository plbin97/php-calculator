exports.build = ()=> {
    require('./style.css');
    let keys = require('./Keys');
    let frame = document.createElement("div");
    frame.className = 'frame';

    let display = document.createElement("div");
    display.className = 'display';
    display.id = "display";
    display.contentEditable = 'true';
    frame.appendChild(display);

    let numberPad = document.createElement("div");
    numberPad.className = "numberPad";
    frame.appendChild(numberPad);

    for (let i = 0;i < 5;i++) {
        for (let j = 0;j < 4;j++) {
            let button = document.createElement("div");
            button.className = "button";
            button.onclick = keys.FunctionsForKeys[i][j];
            button.innerHTML = keys.key[i][j];
            numberPad.appendChild(button);
        }
        numberPad.appendChild(document.createElement("br"));
    }

    let equal = document.createElement("div");
    equal.className = "equal";
    equal.innerText = "=";
    equal.onclick = () => {
        require('./makeCalculation').calculate(display.innerText,(result)=> {
            if (result) {
                display.innerHTML = result;
                let selection = window.getSelection();
                for(let position = 0; position !== result.length; position++) {
                    selection.modify("move", "right", "character");
                }
            } else {
                console.log("time out");
            }
        });
    };
    frame.appendChild(equal);

    document.body.appendChild(frame);
};