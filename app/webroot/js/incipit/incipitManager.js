var currenteNotePressed = "f";
var dibujarMallado = false;
var noteSelected = null;


function IncipitClass()
{

    /*REGION VARIABLES*/
    this.Notes = null;

    /*ENDREGION*/
    /*REGION FUNCTIONS*/

    this.initializeNotesArray = function()
    {
        var context = this;
        context.Notes = 
        [
            //Claves
            {name: "clef", value: "1", font: "bold 46px Maestro", xStep: "0"}, //46 for clef
            {name: "clef2", value: "2", font: "bold 46px Maestro", xStep: "0"}, //46 for clef
            {name: "clef3", value: "3", font: "bold 46px Maestro", xStep: "0"}, //46 for clef

            //Notas
            {name: "maxima", value: "a", font: "bold 38px Maestro", xStep: "0"},
            {name: "longa", value: "b", font: "bold 38px Maestro", xStep: "0"},
            {name: "breve", value: "c", font: "bold 38px Maestro", xStep: "0"},
            {name: "semibreve", value: "d", font: "bold 38px Maestro", xStep: "0"},
            {name: "minim", value: "e", font: "bold 38px Maestro", xStep: "0"},
            {name: "crotchet", value: "f", font: "bold 38px Maestro", xStep: "0"},
            {name: "quaver", value: "g", font: "bold 38px Maestro", xStep: "0"},
            {name: "semiquaver", value: "h", font: "bold 38px Maestro", xStep: "0"},
            {name: "demisemiquaver", value: "i", font: "bold 38px Maestro", xStep: "0"},
            {name: "hemidemisemiquaver", value: "j", font: "bold 38px Maestro", xStep: "0"},

            //Accidentales
            {name: "sostenido", value: "k", font: "bold 38px Maestro", xStep: "0"},
            {name: "doblesostenido", value: "l", font: "bold 38px Maestro", xStep: "0"},
            {name: "bemol", value: "m", font: "bold 38px Maestro", xStep: "0"},
            {name: "doblebemol", value: "n", font: "bold 38px Maestro", xStep: "0"},
            {name: "becuadro", value: "o", font: "bold 38px Maestro", xStep: "0"},
            {name: "sostenido2", value: "p", font: "bold 38px Maestro", xStep: "0"},

            //silencios
            {name: "silencio1", value: "!", font: "bold 38px Maestro", xStep: "0"},
            {name: "silencio2", value: "\"", font: "bold 38px Maestro", xStep: "0"},
            {name: "silencio3", value: "#", font: "bold 38px Maestro", xStep: "0"},
            {name: "silencio4", value: "$", font: "bold 38px Maestro", xStep: "0"},
            {name: "silencio5", value: "%", font: "bold 38px Maestro", xStep: "0"},
            {name: "silencio6", value: "&", font: "bold 38px Maestro", xStep: "0"},
            {name: "silencio7", value: "'", font: "bold 38px Maestro", xStep: "0"},
            {name: "silencio8", value: "(", font: "bold 38px Maestro", xStep: "0"},
            {name: "silencio9", value: ")", font: "bold 38px Maestro", xStep: "0"},
            {name: "silencio0", value: "*", font: "bold 38px Maestro", xStep: "0"}
        ];
    }    

    //Get the Note Name by the Note value
    this.getNoteNameByValue = function (value)
    {
        for(var i = 0; i < this.Notes.length; i++)
        {
            if(this.Notes[i].value === value)
            {
                return this.Notes[i].name;
            }
        }
    }

    //Get the Note Value by the Note name
    this.getNoteValueByName = function(name)
    {
        for(var i = 0; i < this.Notes.length; i++)
        {
            if(this.Notes[i].name === name)
            {
                return this.Notes[i].value;
            }
        }
    }

    //Get the note by the value
    this.getNoteByValue = function(value)
    {
        for(var i = 0; i < this.Notes.length; i++)
        {
            if(this.Notes[i].value === value)
            {
                return this.Notes[i];
            }
        }
    }

    //Get the note by the name
    this.getNoteByName = function(name)
    {
        for(var i = 0; i < this.Notes.length; i++)
        {
            if(this.Notes[i].name === name)
            {
                return this.Notes[i];
            }
        }
    }
    /*ENDREGION*/
}


function CanvasClass ()
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

    this.testElements = new Array();

    this.logicalPlace   = new Array();
    this.incipit        = new IncipitClass();

    /*REGION EVENTS*/
    //onClick canvas
    this.clickOnCanvas = function(context, event)
    {
        var cursor = context.getCursorPosition(context, event);

        if(!context.clickExistingElement(context, cursor))
        {
            context.addNote(context, cursor);
        }
    };

    //onhoverCanvas
    this.hoverOnCanvas = function(context, event)
    {
        var cursor = context.getCursorPosition(context, event);

        context.showNote(context, cursor);
    };

    this.doKeyDown = function(context, event)
    {
        if(event.keyCode == 109)
        {
            dibujarMallado = !dibujarMallado;
        }

        context.drawPentagram(context);
    };
    /*ENDREGION*/
    /*REGION PRIVATE FUNCTIONS*/
    //Starting canvas
    this.initializeCanvas = function(canvasElement) 
    {
        var context = this;

        if (!canvasElement) {
            canvasElement = document.createElement("incipitCanvas");
            canvasElement.id = "incipit_canvas";
            document.body.appendChild(canvasElement);
        }

        context.incipit.initializeNotesArray();

        context.gCanvasElement = canvasElement;
        context.gCanvasElement.width = canvasElement.width;
        context.gCanvasElement.height = canvasElement.height;
        //set the on click function on the canvas
        context.gCanvasElement.addEventListener("click", function(event) { context.clickOnCanvas(context, event) } , false);
        //set the mouse hover function on the canvas
        context.gCanvasElement.addEventListener("mousemove", function(event) { context.hoverOnCanvas(context, event) } , false);

        window.addEventListener("keypress", function(e) { context.doKeyDown(context, e) }, false );

        context.gDrawingContext = context.gCanvasElement.getContext("2d");

        context.gDrawingContext.textBaseline = "top";

        context.insertElement(context, context.incipit.getNoteByName("clef").name, 0, 0, null, null, null, null);

        context.logicalPlace.push(context.step*15); //15 for normal clef
    };

    //Cursor position on cavnas
    this.getCursorPosition = function(context, event) 
    {
        var rect = context.gCanvasElement.getBoundingClientRect();
        var x = Math.round((event.clientX-rect.left)/(rect.right-rect.left)*context.gCanvasElement.width);
        var y = Math.round((event.clientY-rect.top)/(rect.bottom-rect.top)*context.gCanvasElement.height);

        var cursor = new Array(Math.floor(x/50), Math.floor(y/context.step));

        var cursor = new Array(Math.floor(x/50), Math.floor(y/context.step));
        
        if(cursor[1] > context.maxSetpY)
        {
            cursor[1] = context.maxSetpY;
        }

        if(cursor[1] < context.minSetpY)
        {
            cursor[1] = context.minSetpY;
        }

        return cursor;
    };


    //Click on an Existing Element on the current canvas
    this.clickExistingElement = function(context, cursor)
    {
        if(cursor[0] <= context.testElements.length - 1)
        {
            noteSelected = cursor[0];
            return true;
        }

        noteSelected = null;
        return false;
    };

    //Add a new note on the Incipit
    this.addNote = function(context, cursor) 
    {   
        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);

        var note = context.getCurrentNotePressed(context);

        if(note != null)
        {
            context.insertElement(context, note.name, context.testElements.length, 0, null, null, null, null);

            context.logicalPlace.push(cursor[1] * context.step - (context.step * 6) + 2);
        }

        context.drawPentagram(context);
    };

    //Show the note to be draw
    this.showNote = function(context, cursor) 
    {
        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);

        var note = context.getCurrentNotePressed(context);

        if(cursor[0] > context.testElements.length - 1 && note != null)
        {
            context.gDrawingContext.fillStyle = "black";
            context.gDrawingContext.font = note.font;
            context.gDrawingContext.fillText(note.value, context.testElements.length*50, cursor[1] * context.step - (context.step * 6) + 2);
        }

        context.drawPentagram(context);
    };

    //Returns the last note selected (crotchet by default)
    this.getCurrentNotePressed = function(context)
    {
        for(var i = 0; i < context.incipit.Notes.length; i++)
        {       
            if(context.incipit.Notes[i].value === currenteNotePressed)
            {
                return context.incipit.Notes[i];
            }
        }
        return null;
    }

    //Get the button of the table currently pressed and change the note
    this.buttonPushed = function(context, note) 
    {
        if(noteSelected != null)
        {
            context.changeNoteSelected(context, note);
        }
    }

    //Get the button pressed for drawing upper or downer the current note selected
    this.toneUpDown = function(context, up)
    {
        if(noteSelected != null)
        {
            for(var i=0; i < context.testElements.length; i++)
            {
                if(i == noteSelected)
                {
                    context.logicalPlace[i] = context.logicalPlace[i] + up * context.step;
                }
            }

            context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
            context.drawPentagram(context);
        }
    }

    //Called by a button, it change the current note selected
    this.changeNoteSelected = function(context, note)
    {

        for(var i=0; i < context.testElements.length; i++)
        {
            if(i == noteSelected)
            {
                context.testElements[i].noteName = context.incipit.getNoteByValue(note).name;    
            }
        }

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }

    //Insert an Element on the Incipit
    this.insertElement = function(context, name, positionX, positionY, puntillo, accidentales, accidentalesName, invertida)
    {

        if(name == null)               name = "clef";
        if(positionX == null)          positionX = 0;
        if(positionY == null)          positionY = 0;
        if(puntillo == null)           puntillo = false;
        if(accidentales == null)       accidentales = false;
        if(accidentalesName == null)   accidentalesName = "becuadro";
        if(invertida == null)          invertida = false;
        

        context.testElements.push({
                                    noteName: name, 
                                    xPosition: positionX,
                                    yPosition: positionY,
                                    puntillo: puntillo,
                                    accidentales: accidentales,
                                    accidentalesName: accidentalesName,
                                    invertida: invertida
                                });
    }

    //Erase an Element on the position X on the incipit
    this.eraseElement = function(context, positionX)
    {
        /*if(this.name == null)               this.name = "clef";
        if(this.positionX == null)          this.positionX = 0;
        if(this.positionY == null)          this.positionY = 0;
        if(this.puntillo == null)           this.puntillo = false;
        if(this.accidentales == null)       this.accidentales = false;
        if(this.accidentalesName == null)   this.accidentalesName = "becuadro";
        if(this.invertida == null)          this.invertida = false;
        

        context.TestElements.push({
                                    NoteName: this.name, 
                                    xPosition: this.positionX,
                                    yPosition: this.positionY,
                                    puntillo: this.puntillo,
                                    accidentales: this.accidentales,
                                    accidentalesName: this.accidentalesName,
                                    invertida: this.invertida
                                });*/
    }

    /*REGION DRAW*/
    this.drawPentagram = function(context)
    {   
        //Incipit.gDrawingContext.clearRect(0, 0, Incipit.gCanvasElement.width, Incipit.gCanvasElement.height);
        //Dibujo rayas pentagrama
        context.gDrawingContext.beginPath();
        context.gDrawingContext.strokeStyle="#000000";
        context.gDrawingContext.lineWidth="2";

        var halfScreenYpx = (context.step * context.stepOnY / 2); //Half screen y pixels
        /* DRAWING PENTAGRAM */

        //Drawing the 5 lines of pentragram
        for(var i=-2, qty = 2; i<=2; i++)
        {
            var pixelsToAdd = (context.step * qty * i + context.step / 2)
            context.gDrawingContext.moveTo(0, halfScreenYpx + pixelsToAdd);
            context.gDrawingContext.lineTo(context.gCanvasElement.width, halfScreenYpx + pixelsToAdd);
        }

        //notes
        for(var i=0; i < context.testElements.length; i++)
        {
            context.gDrawingContext.fillStyle = "black";
            if(i == noteSelected)
            {
                context.gDrawingContext.fillStyle = "orange";
            }
            
            var noteToDraw = context.incipit.getNoteByName(context.testElements[i].noteName);

            context.gDrawingContext.font = noteToDraw.font;
            context.gDrawingContext.fillText(noteToDraw.value, context.testElements[i].xPosition * 50, context.logicalPlace[i]);
        }

        context.gDrawingContext.stroke();
        /* FINISH DRAWING PENTAGRAM */

        /* MALLADO */
        if(dibujarMallado)
        {
            context.gDrawingContext.beginPath();
            context.gDrawingContext.lineWidth = "1";

            for(var i=0; i<context.gCanvasElement.width; i++)
            {
                if(i%50 == 0)
                {
                    if( i%50 == 0)
                    {
                        context.gDrawingContext.strokeStyle="#0000FF";
                    }
                    else
                    {
                        context.gDrawingContext.strokeStyle="#000000";
                    }

                    context.gDrawingContext.moveTo(i, 0);
                    context.gDrawingContext.lineTo(i, context.gCanvasElement.height);

                    context.gDrawingContext.stroke();
                }
            }

            for(var j=0; j<context.gCanvasElement.height; j=j+8)
            {
                context.gDrawingContext.beginPath();
                context.gDrawingContext.lineWidth="1";
                context.gDrawingContext.strokeStyle="#000000";

                if(j/8 == context.maxSetpY +1 || j/8 == context.minSetpY)
                {
                    context.gDrawingContext.strokeStyle="#0000FF";
                }

                context.gDrawingContext.moveTo(0, j);
                context.gDrawingContext.lineTo(context.gCanvasElement.width, j);

                context.gDrawingContext.stroke();
            }
        }
        /*FIN DE MALLADO*/
    }
    /*ENDREGION*/
    /*ENDREGION*/
};

//Define the object Canvas
var CanvasIncipit = new CanvasClass();

//Recive the note to currently display
function NotePressed(note)
{
    currenteNotePressed = note;
    CanvasIncipit.buttonPushed(CanvasIncipit, note);
};

//Move the note up or down, depending of the button pushed
function toneUpDown(up) 
{
    CanvasIncipit.toneUpDown(CanvasIncipit, up);
};

//Initialize the Canvas
function initializeIncipit(canvasElement) 
{

    CanvasIncipit.initializeCanvas(canvasElement);

    CanvasIncipit.drawPentagram(CanvasIncipit);
};
