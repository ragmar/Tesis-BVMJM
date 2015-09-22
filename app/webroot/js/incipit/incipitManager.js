var currenteNotePressed = "f";
var dibujarMallado = false;
var positionNoteSelected = null;


function IncipitClass()
{

    /*REGION VARIABLES*/
    this.Notes = null;

    /*ENDREGION*/
    /*REGION FUNCTIONS*/

    this.initializeNotesArray = function()
    {
        var context = this;

        context.Accidentals =
        [
            //Accidentales
            {name: "doblesostenido",    value: "l", font: "bold 35px Maestro", xPosition: -13, yPosition: 4},
            {name: "bemol",             value: "m", font: "bold 35px Maestro", xPosition: -13, yPosition: 5},
            {name: "doblebemol",        value: "n", font: "bold 35px Maestro", xPosition: -20, yPosition: 5},
            {name: "becuadro",          value: "o", font: "bold 35px Maestro", xPosition: -13, yPosition: 12},
            {name: "sostenido",         value: "p", font: "bold 35px Maestro", xPosition: -13, yPosition: 11}
        ];

        context.AccidentalClefPositionNote =
        [
            {name: "treble",    xPosition: 0, yPosition: 4},
            {name: "alto",      xPosition: 0, yPosition: 4},
            {name: "bass",      xPosition: 0, yPosition: 4}
        ];

        context.AccidentalClefPositionSostenido =
        [ 
            {xPosition: 50, yPosition: -22},
            {xPosition: 60, yPosition: 4},
            {xPosition: 70, yPosition: -30},
            {xPosition: 80, yPosition: -6},
            {xPosition: 90, yPosition: 20},
            {xPosition: 100, yPosition: -14},
            {xPosition: 110, yPosition: 12}
        ];

        context.AccidentalClefPositionBemol =
        [ 
            {xPosition: 50, yPosition: 5},
            {xPosition: 60, yPosition: -19},
            {xPosition: 70, yPosition: 13},
            {xPosition: 80, yPosition: -11},
            {xPosition: 90, yPosition: 21},
            {xPosition: 100, yPosition: -3},
            {xPosition: 110, yPosition: 28}
        ];

        context.DotNote =
        [
            //Accidentales
            {name: "dot",    value: "q", font: "bold 35px Maestro", xPosition: 18, yPosition: 5}
        ];

        context.Notes = 
        [
            //Claves
            {name: "treble",   value: "1", font: "bold 56px Maestro", isRest: false, yPosition: 7}, //46 for clef
            {name: "alto",     value: "2", font: "bold 56px Maestro", isRest: false, yPosition: 5}, //46 for clef
            {name: "bass",     value: "3", font: "bold 56px Maestro", isRest: false, yPosition: 3}, //46 for clef

            //Notas
            {name: "maxima",             value: "a", font: "bold 38px Maestro", isRest: false},
            {name: "longa",              value: "b", font: "bold 38px Maestro", isRest: false},
            {name: "breve",              value: "c", font: "bold 38px Maestro", isRest: false},
            {name: "semibreve",          value: "d", font: "bold 38px Maestro", isRest: false},
            {name: "minim",              value: "e", font: "bold 38px Maestro", isRest: false},
            {name: "crotchet",           value: "f", font: "bold 38px Maestro", isRest: false},
            {name: "quaver",             value: "g", font: "bold 38px Maestro", isRest: false},
            {name: "semiquaver",         value: "h", font: "bold 38px Maestro", isRest: false},
            {name: "demisemiquaver",     value: "i", font: "bold 38px Maestro", isRest: false},
            {name: "hemidemisemiquaver", value: "j", font: "bold 38px Maestro", isRest: false},

            //Silencios
            {name: "restMax",            value: "!",  font: "bold 38px Maestro", isRest: true, yPosition: 8},
            {name: "restLon",            value: "\"", font: "bold 38px Maestro", isRest: true, yPosition: 8},
            {name: "restBrev",           value: "#",  font: "bold 38px Maestro", isRest: true, yPosition: 8},
            {name: "restSemirev",        value: "$",  font: "bold 38px Maestro", isRest: true, yPosition: 8},
            {name: "restMinim",          value: "%",  font: "bold 38px Maestro", isRest: true, yPosition: 8},
            {name: "restCrotchet",       value: "&",  font: "bold 38px Maestro", isRest: true, yPosition: 8},
            {name: "restQuaver",         value: "'",  font: "bold 38px Maestro", isRest: true, yPosition: 8},
            {name: "restSemiqua",        value: "(",  font: "bold 38px Maestro", isRest: true, yPosition: 8},
            {name: "restDemsemqu",       value: ")",  font: "bold 38px Maestro", isRest: true, yPosition: 8},
            {name: "restHemdemsemqu",    value: "*",  font: "bold 38px Maestro", isRest: true, yPosition: 8}
        ];
    }    

    /*REGION NOTES FUNCTIONS*/
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
    /*ENDREGION*/
    /*REGION ACCIDENTALS FUNCTIONS*/
    //Get the note by the name
    this.getAccidentalByName = function(name)
    {
        for(var i = 0; i < this.Accidentals.length; i++)
        {
            if(this.Accidentals[i].name === name)
            {
                return this.Accidentals[i];
            }
        }
    }

    //Get the note by the value
    this.getAccidentalByValue = function(value)
    {
        for(var i = 0; i < this.Accidentals.length; i++)
        {
            if(this.Accidentals[i].value === value)
            {
                return this.Accidentals[i];
            }
        }
    }
    /*ENDREGION*/
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
    this.maxStepY   = 29;
    this.minStepY   = 11;

    this.drawIncipitElements = new Array();
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

        var clef = context.incipit.getNoteByName("treble");

        context.insertElement(context, //context
                            clef.name, //name
                            0,     //xposition
                            clef.yPosition,//yposition
                            null,  //hasDot
                            null,  //qtyAccidental
                            null,  //accidentalname
                            null,  //inverted
                            true); //isclef
    };

    //Cursor position on cavnas
    this.getCursorPosition = function(context, event) 
    {
        var rect = context.gCanvasElement.getBoundingClientRect();
        var cursor = {x: 0, y: 0}
        var x = Math.round((event.clientX-rect.left)/(rect.right-rect.left)*context.gCanvasElement.width);
        var y = Math.round((event.clientY-rect.top)/(rect.bottom-rect.top)*context.gCanvasElement.height);

        cursor.x = Math.floor(x/50);
        cursor.y = Math.floor(y/context.step);
        
        if(cursor.y > context.maxStepY)
        {
            cursor.y = context.maxStepY;
        }

        if(cursor.y < context.minStepY)
        {
            cursor.y = context.minStepY;
        }

        return cursor;
    };

    //Transform cursor coordinates to drawIncipitElements coordinates
    this.cursorToElement = function(context, cursor)
    {
        var x = cursor.x;
        var y = cursor.y - context.minStepY;
        return {x: x, y: y};
    };


    //Click on an Existing Element on the current canvas
    this.clickExistingElement = function(context, cursor)
    {
        if(cursor.x <= context.drawIncipitElements.length - 1)
        {
            positionNoteSelected = cursor.x;
            return true;
        }

        positionNoteSelected = null;
        return false;
    };

    //Add a new note on the Incipit
    this.addNote = function(context, cursor) 
    {   
        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);

        var note = context.getCurrentNotePressed(context);

        if(note != null)
        {
            var eleCoord = context.cursorToElement(context, cursor);

            if(note.isRest)
            {
                eleCoord.y = note.yPosition;
            }

            context.insertElement(context, //context
                                note.name, //noteName
                                context.drawIncipitElements.length, //xPosition
                                eleCoord.y, //yPosition
                                null, //hasDot
                                null, //qtyAccidental
                                null, //accidentalName
                                false, //inverted
                                false); //isClef
        }

        context.drawPentagram(context);
    };

    //Show the note to be draw
    this.showNote = function(context, cursor) 
    {
        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);

        var note = context.getCurrentNotePressed(context);

        if(cursor.x > context.drawIncipitElements.length - 1 && note != null)
        {
            var eleCoord = context.cursorToElement(context, cursor);

            if(note.isRest)
            {
                eleCoord.y = note.yPosition;
            }

            context.gDrawingContext.fillStyle = "grey";
            var tempEle = context.createElement(context,            //insert
                                note.name,                          //noteName
                                context.drawIncipitElements.length, //xPositon
                                eleCoord.y,                         //yPosition
                                null,                               //hasDot
                                null,                               //qtyAccidental
                                null,                               //accidentalName
                                false);                             //isClef

            var noteToDraw = context.incipit.getNoteByName(note.name);
            var notePosition = context.getDrawPosition(context, tempEle, context.drawIncipitElements.length);

            context.gDrawingContext.font = noteToDraw.font;
            context.gDrawingContext.fillText(noteToDraw.value, 
                                            notePosition.x, 
                                            notePosition.y);
        }

        context.drawPentagram(context);
    };

    //Get the button pressed for drawing upper or downer the current note selected
    this.toneUpDown = function(context, up)
    {
        if(positionNoteSelected != null)
        {
            for(var i=0; i < context.drawIncipitElements.length; i++)
            {
                if(i == positionNoteSelected 
                    && !context.drawIncipitElements[i].isClef
                    && !context.incipit.getNoteByName(context.drawIncipitElements[i].noteName).isRest
                    && context.drawIncipitElements[i].yPosition + up >= 0 
                    && context.drawIncipitElements[i].yPosition + up < 19)
                {
                    console.log(context.drawIncipitElements[i]);
                    context.drawIncipitElements[i].yPosition = context.drawIncipitElements[i].yPosition + up;
                }
            }

            context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
            context.drawPentagram(context);
        }
    }

    //Returns the current note selected (crotchet by default)
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

    //Get the clef of the table currently pressed and change the clef
    this.clefPushed = function(context, clef) 
    {
        positionNoteSelected = 0;
        context.changeNoteSelected(context, clef, true, false);
    }

    //Get the note of the table currently pressed and change the note
    this.notePushed = function(context, note) 
    {
        if(positionNoteSelected != null)
        {
            context.changeNoteSelected(context, note, false);
        }
    }

    //It change the current note selected
    this.changeNoteSelected = function(context, note, isClef)
    {
        if(positionNoteSelected == 0 && !isClef)
        {
            return;
        }

        for(var i=0; i < context.drawIncipitElements.length; i++)
        {
            if(i == positionNoteSelected)
            {
                var noteByValue = context.incipit.getNoteByValue(note);

                if(noteByValue.isRest || isClef)
                {
                    context.drawIncipitElements[i].yPosition = noteByValue.yPosition;
                }

                context.drawIncipitElements[i].noteName = noteByValue.name;    
            }
        }

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }

    //Get the accidental of the table pushed and add the accidental to the note
    this.accidentalPushed = function(context, accidental)
    {
        if(positionNoteSelected != null)
        {
            context.addAccidental(context, accidental);
        }
    }

    //Add the accidental on the current note
    this.addAccidental = function(context, currentAccidental)
    {
        var accidental = context.incipit.getAccidentalByValue(currentAccidental);
        for(var i=0; i < context.drawIncipitElements.length; i++)
        {
            if(i == positionNoteSelected
                && !context.incipit.getNoteByName(context.drawIncipitElements[i].noteName).isRest)
            {
                if(context.drawIncipitElements[i].isClef) 
                {
                    if(accidental.name != "sostenido" && accidental.name != "bemol") return;

                    if(context.drawIncipitElements[i].qtyAccidental < 7)
                    {
                        context.drawIncipitElements[i].qtyAccidental += 1;
                    }
                }
                else if(context.drawIncipitElements[i].qtyAccidental == 1
                    && context.drawIncipitElements[i].accidentalName == accidental.name)
                {
                    context.drawIncipitElements[i].qtyAccidental = 0;
                }
                else
                {
                    context.drawIncipitElements[i].qtyAccidental = 1;
                }
                
                context.drawIncipitElements[i].accidentalName = accidental.name;
            }
        }

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }

    //Get the button of the table pushed and add the dot to the note
    this.dotPushed = function(context)
    {
        if(positionNoteSelected != null)
        {
            context.addDot(context);
        }
    }

    //Add the accidental on the current note
    this.addDot = function(context)
    {
        for(var i=0; i < context.drawIncipitElements.length; i++)
        {
            if(i == positionNoteSelected 
                && !context.drawIncipitElements[i].isClef
                && !context.incipit.getNoteByName(context.drawIncipitElements[i].noteName).isRest)
            {
                context.drawIncipitElements[i].hasDot = !context.drawIncipitElements[i].hasDot;
            }
        }

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }


    //Create an Element of the incipit
    this.createElement = function(context, name, xPosition, yPosition, hasDot, qtyAccidental, accidentalName, invertida, isClef)
    {

        if(name == null)               name = "treble";
        if(xPosition == null)          xPosition = 0;
        if(yPosition == null)          yPosition = 0;
        if(hasDot == null)             hasDot = false;
        if(qtyAccidental == null)      qtyAccidental = 0;
        if(accidentalName == null)     accidentalName = "becuadro";
        if(invertida == null)          invertida = false;
        if(isClef == null)             isClef = false;
        
        return(
            {
                noteName: name, 
                xPosition: xPosition,
                yPosition: yPosition,
                hasDot: hasDot,
                qtyAccidental: qtyAccidental,
                accidentalName: accidentalName,
                invertida: invertida,
                isClef: isClef
            });
    }

    //Insert an Element on the Incipit
    this.insertElement = function(context, name, xPosition, yPosition, hasDot, qtyAccidental, accidentalName, invertida, isClef)
    {   
        context.drawIncipitElements.push(context.createElement(context, 
                                                        name, 
                                                        xPosition, 
                                                        yPosition, 
                                                        hasDot, 
                                                        qtyAccidental, 
                                                        accidentalName, 
                                                        invertida,
                                                        isClef));
    }

    //Erase an Element on the position X on the incipit
    this.eraseElement = function(context, xPosition)
    {

    }

    /*REGION DRAW*/
    //functions that returns the drawing coords of the element
    this.getDrawPosition = function(context, element, index)
    {

        var positionX = element.xPosition * 50;

        /*yPosition is between 0 and 18, we multiply by Step to draw it on the clicked position, but 
        the Stem cause problems not drawing the Note head on the position, that why the substract
        step*6 + 2 occurs, to set it on the mouse position */
        var positionY = (element.yPosition + context.minStepY) * context.step - (context.step * 6) + 2;

        return {x: positionX, y: positionY};

    }

    //Main function that draw incipit
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
        for(var i=0; i < context.drawIncipitElements.length; i++)
        {
            context.gDrawingContext.fillStyle = "black";
            if(i == positionNoteSelected)
            {
                context.gDrawingContext.fillStyle = "orange";
            }
            
            var noteToDraw = context.incipit.getNoteByName(context.drawIncipitElements[i].noteName);
            var notePosition = context.getDrawPosition(context, context.drawIncipitElements[i], i);

            if(context.drawIncipitElements[i].qtyAccidental > 0)
            {
                var accidental = context.incipit.getAccidentalByName(context.drawIncipitElements[i].accidentalName);

                if(context.drawIncipitElements[i].isClef)
                {
                    var positionAccidental;

                    for(var j=0; j < context.drawIncipitElements[i].qtyAccidental; j++)
                    {
                        console.log(context.drawIncipitElements[i]);
                        if(accidental.name == "sostenido")
                        {
                            positionAccidental = context.incipit.AccidentalClefPositionSostenido[j];
                        }


                        if(accidental.name == "bemol")
                        {
                            positionAccidental = context.incipit.AccidentalClefPositionBemol[j];
                        }

                        context.gDrawingContext.font = accidental.font;
                        context.gDrawingContext.fillText(accidental.value, 
                                                        notePosition.x + positionAccidental.xPosition, 
                                                        notePosition.y + positionAccidental.yPosition);
                    }
                }
                else
                {
                    context.gDrawingContext.font = accidental.font;
                    context.gDrawingContext.fillText(accidental.value, 
                                                    notePosition.x + accidental.xPosition, 
                                                    notePosition.y + accidental.yPosition);
                }
            }

            if(context.drawIncipitElements[i].hasDot)
            {
                var dot = context.incipit.DotNote[0];

                context.gDrawingContext.font = dot.font;
                context.gDrawingContext.fillText(dot.value, 
                                                notePosition.x + dot.xPosition, 
                                                notePosition.y + dot.yPosition);
            }

            context.gDrawingContext.font = noteToDraw.font;
            context.gDrawingContext.fillText(noteToDraw.value, 
                                            notePosition.x, 
                                            notePosition.y);
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

                if(j/8 == context.maxStepY +1 || j/8 == context.minStepY)
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


//Recive the clef to currently display
function ClefPressed(clef)
{
    CanvasIncipit.clefPushed(CanvasIncipit, clef);
};

//Recive the note to currently display
function NotePressed(note)
{
    currenteNotePressed = note;
    CanvasIncipit.notePushed(CanvasIncipit, note);
};

//Recive the accidental to currently add
function accidentalPressed(accidental)
{
    CanvasIncipit.accidentalPushed(CanvasIncipit, accidental);
};

//Recive the Dot to currently add
function dotPressed(dot)
{
    CanvasIncipit.dotPushed(CanvasIncipit);
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
