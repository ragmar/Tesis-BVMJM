var clef = "1";
var currentNote = "f";
var dibujarMallado = false;

var Incipit =
{
    gCanvasElement: "",
    gDrawingContext: "",

    //8 pixels make 1 step for scale 1:1 and there are a 40 stepOnY and 125 stepOnX
    step : 8,
    stepOnY: 40,
    stepOnX: 125,
    maxSetpY: 29,
    minSetpY: 11,

    insideElements : new Array(),
    logicalPlace : new Array(),
    noteType : new Array()
}


var Notes = 
[
    {name: "clef", value: "1"},
    {name: "maxima", value: "a"},
    {name: "longa", value: "b"},
    {name: "breve", value: "c"},
    {name: "semibreve", value: "d"},
    {name: "minim", value: "e"},
    {name: "crotchet", value: "f"},
    {name: "quaver", value: "g"},
    {name: "semiquaver", value: "h"},
    {name: "demisemiquaver", value: "i"},
    {name: "hemidemisemiquaver", value: "j"}
]

//Get the Note Name by the Note value
function getNoteNameByValue(value)
{
    for(var i = 0; i < Notes.length; i++)
    {
        if(Notes[i].value === value)
        {
            return Notes[i].name;
        }
    }
}

//Get the Note Value by the Note name
function getNoteValueByName(name)
{
    for(var i = 0; i < Notes.length; i++)
    {
        if(Notes[i].name === name)
        {
            return Notes[i].value;
        }
    }
}

//Get the note by the value
function getNoteByValue(value)
{
    for(var i = 0; i < Notes.length; i++)
    {
        if(Notes[i].value === value)
        {
            return Notes[i];
        }
    }
}

//Get the note by the name
function getNoteByName(name)
{
    for(var i = 0; i < Notes.length; i++)
    {
        if(Notes[i].name === name)
        {
            return Notes[i];
        }
    }
}

//British Names
var NoteName =
{
    clef:       "clef",
    noteMaxima: "maxima",
    noteLonga:  "longa",
    note0:      "breve",
    note1:      "semibreve",
    note2:      "minim",
    note4:      "crotchet",
    note8:      "quaver",
    note16:     "semiquaver",
    note32:     "demisemiquaver",
    note64:     "hemidemisemiquaver"
}

var NoteValue =
{
    clef :      "1",
    noteMaxima: "a",
    noteLonga:  "b",
    note0:      "c",
    note1:      "d",
    note2:      "e",
    note4:      "f",
    note8:      "g",
    note16:     "h",
    note32:     "i",
    note64:     "j"

}

function getCurrentNote()
{
    for(var i = 0; i < Notes.length; i++)
    {       
        if(Notes[i].value === currentNote)
        {
            return Notes[i];
        }
    }
    return null;
}

//Recive the note to currently display
function NoteSelected(note)
{
    currentNote = note;
};
function getCursorPosition(e) {
    /* returns Cell with .row and .column properties */
    var x;
    var y;
    if (e.pageX != undefined && e.pageY != undefined) 
    {
        x = e.pageX;
        y = e.pageY;
    }
    else 
    {
        x = e.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
        y = e.clientY + document.body.scrollTop + document.documentElement.scrollTop;
    }

    x -= Incipit.gCanvasElement.offsetLeft;
    y -= Incipit.gCanvasElement.offsetTop;

    x = Math.min(x, Incipit.gCanvasElement.width * 50);
    y = Math.min(y, Incipit.gCanvasElement.height * Incipit.step);

   /* console.log("x y");
    console.log(x,y);*/
    var cursor = new Array(Math.floor(x/50), Math.floor(y/Incipit.step));

   /* console.log("cursor");
    console.log(cursor);*/
    
    if(cursor[1] > Incipit.maxSetpY)
    {
        cursor[1] = Incipit.maxSetpY;
    }

    if(cursor[1] < Incipit.minSetpY)
    {
        cursor[1] = Incipit.minSetpY;
    }
   /* console.log("cursor limited");
    console.log(cursor);*/
    return cursor;
}


function drawingCoordToLogicalCoord(drawingCoordX, drawingCoordY)
{
    var logicalCoord = new Array();

    logicalCoord.push(drawingCoordY * Incipit.step - (Incipit.step * 6) + 2)
}

function logicalCoordToDrawingCoord(logicalCoordX, logicalCoordY)
{
    var drawingCoord = new Array();
}

function addNote(e) 
{
    var cursor = getCursorPosition(e);
    
    Incipit.gDrawingContext.clearRect(0, 0, Incipit.gCanvasElement.width, Incipit.gCanvasElement.height);
    drawingCoordToLogicalCoord(cursor[0],cursor[1]);

    var note = getCurrentNote();

    if(note != null)
    {

        Incipit.noteType.push(note);
        Incipit.insideElements.push(Incipit.insideElements.length * 50);
        Incipit.logicalPlace.push(cursor[1] * Incipit.step - (Incipit.step * 6) + 2);
    }

    drawPentagram();
}

function showNote(e) 
{
    var cursor = getCursorPosition(e);
    
    Incipit.gDrawingContext.clearRect(0, 0, Incipit.gCanvasElement.width, Incipit.gCanvasElement.height);

    Incipit.gDrawingContext.font = "bold 38px Maestro"; //38 for notes
    Incipit.gDrawingContext.fillText(currentNote, Incipit.insideElements.length*50, cursor[1] * Incipit.step - (Incipit.step * 6) + 2);

    drawPentagram();
}

function doKeyDown(e) 
{
    if(e.keyCode == 109)
    {
        dibujarMallado = !dibujarMallado;
    }

    drawPentagram();
}

function initializeIncipit(canvasElement) {

    if (!canvasElement) {
        canvasElement = document.createElement("incipitCanvas");
        canvasElement.id = "incipit_canvas";
        document.body.appendChild(canvasElement);
    }

    Incipit.gCanvasElement = canvasElement;
    Incipit.gCanvasElement.width = canvasElement.width;
    Incipit.gCanvasElement.height = canvasElement.height;
    Incipit.gCanvasElement.addEventListener("click", addNote, false);
    Incipit.gCanvasElement.addEventListener("mousemove", showNote, false);
    window.addEventListener("keypress", doKeyDown, false );

    Incipit.gDrawingContext = Incipit.gCanvasElement.getContext("2d");

    Incipit.gDrawingContext.font = "bold 38px Maestro"; //38 for notes
    Incipit.gDrawingContext.textBaseline = "top";

    //inicializar canvas

    Incipit.noteType.push(getNoteByName("clef"));
    Incipit.insideElements.push(0);
    Incipit.logicalPlace.push(Incipit.step*15); //15 for normal clef

    drawPentagram();
}

/*DRAW FUNCTION */
function drawPentagram()
{   
    //Incipit.gDrawingContext.clearRect(0, 0, Incipit.gCanvasElement.width, Incipit.gCanvasElement.height);
    //Dibujo rayas pentagrama
    Incipit.gDrawingContext.beginPath();
    Incipit.gDrawingContext.strokeStyle="#000000";
    Incipit.gDrawingContext.lineWidth="2";

    var halfScreenYpx = (Incipit.step * Incipit.stepOnY / 2); //Half screen y pixels
    /* DRAWING PENTAGRAM */

    //Drawing the 5 lines of pentragram
    for(var i=-2, qty = 2; i<=2; i++)
    {
        var pixelsToAdd = (Incipit.step * qty * i + Incipit.step / 2)
        Incipit.gDrawingContext.moveTo(0, halfScreenYpx + pixelsToAdd);
        Incipit.gDrawingContext.lineTo(Incipit.gCanvasElement.width, halfScreenYpx + pixelsToAdd);
    }

    //notes
    for(var i=0; i < Incipit.insideElements.length; i++)
    {
        if(Incipit.noteType[i] == NoteName.clef)
        {
            Incipit.gDrawingContext.font = "bold 46px Maestro"; //46 for clef
            Incipit.gDrawingContext.fillText(NoteValue.clef, Incipit.insideElements[i] + 3, Incipit.logicalPlace[i]);
        }else
        {
            Incipit.gDrawingContext.font = "bold 38px Maestro"; //38 for main
            Incipit.gDrawingContext.fillText(Incipit.noteType[i].value, Incipit.insideElements[i], Incipit.logicalPlace[i]);
        }
    }

    Incipit.gDrawingContext.stroke();
    /* FINISH DRAWING PENTAGRAM */

    /* MALLADO */
    if(dibujarMallado)
    {
        Incipit.gDrawingContext.beginPath();
        Incipit.gDrawingContext.strokeStyle="#000000";
        Incipit.gDrawingContext.lineWidth="1";

        for(var i=0; i<Incipit.gCanvasElement.width; i=i+8)
        {

            Incipit.gDrawingContext.moveTo(i, 0);
            Incipit.gDrawingContext.lineTo(i, Incipit.gCanvasElement.height);
        }

        Incipit.gDrawingContext.stroke();

        for(var j=0; j<Incipit.gCanvasElement.height; j=j+8)
        {
            Incipit.gDrawingContext.beginPath();
            Incipit.gDrawingContext.lineWidth="1";
            Incipit.gDrawingContext.strokeStyle="#000000";

            if(j/8 == Incipit.maxSetpY +1 || j/8 == Incipit.minSetpY)
            {
                Incipit.gDrawingContext.strokeStyle="#0000FF";
            }

            Incipit.gDrawingContext.moveTo(0, j);
            Incipit.gDrawingContext.lineTo(Incipit.gCanvasElement.width, j);

            Incipit.gDrawingContext.stroke();
        }
    }
    /*FIN DE MALLADO*/
}