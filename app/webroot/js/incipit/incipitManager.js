var currenteNotePressed = "f";
var dibujarMallado = false;
var noteSelected = null;


function IncipitClass ()
{
    //Variables
    this.gCanvasElement = "";
    this.gDrawingContext = "";

    //8 pixels make 1 step for scale 1:1 and there are a 40 stepOnY and 125 stepOnX
    this.step       = 8;
    this.stepOnY    = 40;
    this.stepOnX    = 125;
    this.maxSetpY   = 29;
    this.minSetpY   = 11;

    this.insideElements = new Array();
    this.logicalPlace   = new Array();
    this.noteType       = new Array();

    //Functions

    this.initializeCanvas = function(canvasElement) 
    {
        if (!canvasElement) {
            canvasElement = document.createElement("incipitCanvas");
            canvasElement.id = "incipit_canvas";
            document.body.appendChild(canvasElement);
        }

        this.gCanvasElement = canvasElement;
        this.gCanvasElement.width = canvasElement.width;
        this.gCanvasElement.height = canvasElement.height;
        this.gCanvasElement.addEventListener("click", clickOnCanvas, false);
        this.gCanvasElement.addEventListener("mousemove", hoverOnCanvas, false);
        window.addEventListener("keypress", doKeyDown, false );

        this.gDrawingContext = this.gCanvasElement.getContext("2d");

        this.gDrawingContext.textBaseline = "top";
    };
}

var Incipit = new IncipitClass();


var Notes = 
[
    {name: "clef", value: "1", font: "bold 46px Maestro"}, //46 for clef
    {name: "maxima", value: "a", font: "bold 38px Maestro"},
    {name: "longa", value: "b", font: "bold 38px Maestro"},
    {name: "breve", value: "c", font: "bold 38px Maestro"},
    {name: "semibreve", value: "d", font: "bold 38px Maestro"},
    {name: "minim", value: "e", font: "bold 38px Maestro"},
    {name: "crotchet", value: "f", font: "bold 38px Maestro"},
    {name: "quaver", value: "g", font: "bold 38px Maestro"},
    {name: "semiquaver", value: "h", font: "bold 38px Maestro"},
    {name: "demisemiquaver", value: "i", font: "bold 38px Maestro"},
    {name: "hemidemisemiquaver", value: "j", font: "bold 38px Maestro"}
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

//Returns the note selected on the table
function getCurrentNotePressed()
{
    for(var i = 0; i < Notes.length; i++)
    {       
        if(Notes[i].value === currenteNotePressed)
        {
            return Notes[i];
        }
    }
    return null;
}

//Recive the note to currently display
function NotePressed(note)
{
    currenteNotePressed = note;
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

    console.log("x y");
    console.log(x,y);
    var cursor = new Array(Math.floor(x/50), Math.floor(y/Incipit.step));

    console.log("cursor");
    console.log(cursor);
    
    if(cursor[1] > Incipit.maxSetpY)
    {
        cursor[1] = Incipit.maxSetpY;
    }

    if(cursor[1] < Incipit.minSetpY)
    {
        cursor[1] = Incipit.minSetpY;
    }
    console.log("cursor limited");
    console.log(cursor);
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


function clickExistingElement(cursor)
{
    if(cursor[0] <= Incipit.insideElements.length - 1)
    {
        noteSelected = cursor[0];
        return true;
    }

    noteSelected = Incipit.insideElements.length;
    return false;
}

function clickOnCanvas(e)
{
    var cursor = getCursorPosition(e);

    if(!clickExistingElement(cursor))
    {
        addNote(cursor);
    }
}

function hoverOnCanvas(e)
{
    var cursor = getCursorPosition(e);

    showNote(cursor);
}

function addNote(cursor) 
{   
    Incipit.gDrawingContext.clearRect(0, 0, Incipit.gCanvasElement.width, Incipit.gCanvasElement.height);
    drawingCoordToLogicalCoord(cursor[0],cursor[1]);

    var note = getCurrentNotePressed();

    if(note != null)
    {
        Incipit.noteType.push(note);
        Incipit.insideElements.push(Incipit.insideElements.length * 50);
        Incipit.logicalPlace.push(cursor[1] * Incipit.step - (Incipit.step * 6) + 2);
    }

    drawPentagram();
}

function showNote(cursor) 
{
    Incipit.gDrawingContext.clearRect(0, 0, Incipit.gCanvasElement.width, Incipit.gCanvasElement.height);

    var note = getCurrentNotePressed();

    if(cursor[0] > Incipit.insideElements.length - 1 && note != null)
    {
        Incipit.gDrawingContext.fillStyle = "black";
        Incipit.gDrawingContext.font = note.font;
        Incipit.gDrawingContext.fillText(note.value, Incipit.insideElements.length*50, cursor[1] * Incipit.step - (Incipit.step * 6) + 2);
    }

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

    /*if (!canvasElement) {
        canvasElement = document.createElement("incipitCanvas");
        canvasElement.id = "incipit_canvas";
        document.body.appendChild(canvasElement);
    }

    Incipit.gCanvasElement = canvasElement;
    Incipit.gCanvasElement.width = canvasElement.width;
    Incipit.gCanvasElement.height = canvasElement.height;
    Incipit.gCanvasElement.addEventListener("click", clickOnCanvas, false);
    Incipit.gCanvasElement.addEventListener("mousemove", hoverOnCanvas, false);
    window.addEventListener("keypress", doKeyDown, false );

    Incipit.gDrawingContext = Incipit.gCanvasElement.getContext("2d");

    Incipit.gDrawingContext.textBaseline = "top";*/

    this.initializeCanvas(canvasElement);

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
        Incipit.gDrawingContext.fillStyle = "black";
        if(i == noteSelected)
        {
            Incipit.gDrawingContext.fillStyle = "orange";
        }
        
        Incipit.gDrawingContext.font = Incipit.noteType[i].font;
        Incipit.gDrawingContext.fillText(Incipit.noteType[i].value, Incipit.insideElements[i], Incipit.logicalPlace[i]);
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