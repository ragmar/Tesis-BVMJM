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
            {name: "doblesostenido",    value: "l", font: "bold 35px Maestro", xPosition: -13, yPosition: 4, paec: "xx"},
            {name: "bemol",             value: "m", font: "bold 35px Maestro", xPosition: -13, yPosition: 5, paec: "b"},
            {name: "doblebemol",        value: "n", font: "bold 35px Maestro", xPosition: -20, yPosition: 5, paec: "bb"},
            {name: "becuadro",          value: "o", font: "bold 35px Maestro", xPosition: -13, yPosition: 12, paec: "n"},
            {name: "sostenido",         value: "p", font: "bold 35px Maestro", xPosition: -13, yPosition: 11, paec: "x"}
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
            {name: "dot",    value: "q", font: "bold 35px Maestro", xPosition: 18, yPosition: 5, paec: "."}
        ];

        context.Notes = 
        [
            //Claves
            {name: "treble",   value: "1", font: "bold 56px Maestro", isRest: false, yPosition: 7, paec: "%G-2"}, //46 for clef
            {name: "alto",     value: "2", font: "bold 56px Maestro", isRest: false, yPosition: 5, paec: "%C-3"}, //46 for clef
            {name: "bass",     value: "3", font: "bold 56px Maestro", isRest: false, yPosition: 3, paec: "%F-4"}, //46 for clef

            //Notas
            {name: "maxima",             value: "a", font: "bold 38px Maestro", isRest: false, paec: ""}, 
            {name: "longa",              value: "b", font: "bold 38px Maestro", isRest: false, paec: "0"},
            {name: "breve",              value: "c", font: "bold 38px Maestro", isRest: false, paec: "9"},
            {name: "semibreve",          value: "d", font: "bold 38px Maestro", isRest: false, paec: "1"},
            {name: "minim",              value: "e", font: "bold 38px Maestro", isRest: false, paec: "2"},
            {name: "crotchet",           value: "f", font: "bold 38px Maestro", isRest: false, paec: "4"},
            {name: "quaver",             value: "g", font: "bold 38px Maestro", isRest: false, paec: "8"},
            {name: "semiquaver",         value: "h", font: "bold 38px Maestro", isRest: false, paec: "6"},
            {name: "demisemiquaver",     value: "i", font: "bold 38px Maestro", isRest: false, paec: "3"},
            {name: "hemidemisemiquaver", value: "j", font: "bold 38px Maestro", isRest: false, paec: "5"},

            //Silencios
            {name: "restMax",            value: "!",  font: "bold 38px Maestro", isRest: true, yPosition: 8, paec: ""},
            {name: "restLon",            value: "\"", font: "bold 38px Maestro", isRest: true, yPosition: 8, paec: "0-"},
            {name: "restBrev",           value: "#",  font: "bold 38px Maestro", isRest: true, yPosition: 8, paec: "9-"},
            {name: "restSemirev",        value: "$",  font: "bold 38px Maestro", isRest: true, yPosition: 8, paec: "1-"},
            {name: "restMinim",          value: "%",  font: "bold 38px Maestro", isRest: true, yPosition: 8, paec: "2-"},
            {name: "restCrotchet",       value: "&",  font: "bold 38px Maestro", isRest: true, yPosition: 8, paec: "4-"},
            {name: "restQuaver",         value: "'",  font: "bold 38px Maestro", isRest: true, yPosition: 8, paec: "8-"},
            {name: "restSemiqua",        value: "(",  font: "bold 38px Maestro", isRest: true, yPosition: 8, paec: "6-"},
            {name: "restDemsemqu",       value: ")",  font: "bold 38px Maestro", isRest: true, yPosition: 8, paec: "3-"},
            {name: "restHemdemsemqu",    value: "*",  font: "bold 38px Maestro", isRest: true, yPosition: 8, paec: "5-"}
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

    this.getPAECByName = function(name)
    {
        for(var i = 0; i < this.Notes.length; i++)
        {
            if(this.Notes[i].name === name)
            {
                return this.Notes[i].paec;
            }
        }

        for(var i = 0; i < this.DotNote.length; i++)
        {
            if(this.DotNote[i].name === name)
            {
                return this.DotNote[i].paec;
            }
        }

        for(var i = 0; i < this.Accidentals.length; i++)
        {
            if(this.Accidentals[i].name === name)
            {
                return this.Accidentals[i].paec;
            }
        }

        return null;
    }

    this.getNoteByPAEC = function(paec)
    {
        for(var i = 0; i < this.Notes.length; i++)
        {
            if(this.Notes[i].paec === paec)
            {
                return this.Notes[i];
            }
        }

        for(var i = 0; i < this.DotNote.length; i++)
        {
            if(this.DotNote[i].paec === paec)
            {
                return this.DotNote[i];
            }
        }

        for(var i = 0; i < this.Accidentals.length; i++)
        {
            if(this.Accidentals[i].paec === paec)
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

    this.search_mode = false;

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
    this.initializeCanvas = function(canvasElement, search_mode) 
    {
        var context = this;

        context.search_mode = search_mode;

        if (!canvasElement) {
            canvasElement = document.createElement("incipitCanvas");
            canvasElement.id = "incipit_canvas";
            document.body.appendChild(canvasElement);
        }

        context.incipit.initializeNotesArray();

        context.gCanvasElement = canvasElement;
        context.gCanvasElement.width = canvasElement.width;
        context.gCanvasElement.height = canvasElement.height; //standard is 320
        //set the on click function on the canvas
        context.gCanvasElement.addEventListener("click", function(event) { context.clickOnCanvas(context, event) } , false);
        //set the mouse hover function on the canvas
        context.gCanvasElement.addEventListener("mousemove", function(event) { context.hoverOnCanvas(context, event) } , false);

        window.addEventListener("keypress", function(e) { context.doKeyDown(context, e) }, false );

        context.gDrawingContext = context.gCanvasElement.getContext("2d");

        context.gDrawingContext.textBaseline = "top";

        if(!context.search_mode)
        {
            var paec = document.getElementById("incipitPaec");
            context.TransformPAECToIncipit(context, paec.value);
        }

        if(context.drawIncipitElements.length == 0)
        {
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
        }
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

            context.TransformIncipitToPAEC(context);
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

        context.TransformIncipitToPAEC(context);
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
                context.TransformIncipitToPAEC(context);
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
                context.TransformIncipitToPAEC(context);
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

            if(context.drawIncipitElements[i].qtyAccidental > 0 && !noteToDraw.isRest)
            {
                var accidental = context.incipit.getAccidentalByName(context.drawIncipitElements[i].accidentalName);

                if(context.drawIncipitElements[i].isClef)
                {
                    var positionAccidental;

                    for(var j=0; j < context.drawIncipitElements[i].qtyAccidental; j++)
                    {
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

            if(context.drawIncipitElements[i].hasDot && !noteToDraw.isRest)
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
    /*REGION INCIPIT TO PLAINE & EASIE CODE */

    this.getRythmPAEC = function(context, noteElement, note)
    {
        var paecRythm = context.incipit.getPAECByName(note.name);

        if(!note.isRest)
        {
            if(noteElement.hasDot) 
            {
                paecRythm += context.incipit.getPAECByName(context.incipit.DotNote[0].name);
            }
        }
        return paecRythm;
    }

    this.getOctaveNotePAEC = function(context, noteElement, noteRest, clef)
    {

        if(noteRest)
        {
            return ["", ""];
        }
        

        var notePosition    = noteElement.yPosition;
        var notesArray      = [ "B", "A", "G", "F", "E", "D", "C"];
        var paecOctave  = "";
        var paecNote        = "";

        // 19 notes the incipit can represent, 31 notes can mean
        //'''DC''BAGFEDC'BAGFEDC,BAG                 Treble
        //         ''EDC'BAGFEDC,BAGFEDC,,BA         Alto
        //                 'FEDC,BAGFEDC,,BAFEDC,,,B Bass

        if(clef == "treble") notePosition+=0;
        if(clef == "alto")   notePosition+=6;
        if(clef == "bass")   notePosition+=12;

        if(notePosition >= 0 && notePosition <= 1)
        {
            paecOctave = "'''";
        } 
        else if(notePosition >= 2 && notePosition <= 8)
        {
            paecOctave = "''";
        }
        else if(notePosition >= 9 && notePosition <= 15)
        {
            paecOctave = "'";
        }
        else if(notePosition >= 16 && notePosition <= 22)
        {
            paecOctave = ",";
        }
        else if(notePosition >= 23 && notePosition <= 29)
        {
            paecOctave = ",,";
        }
        else if(notePosition >= 30)
        {
            paecOctave = ",,,";
        }

        paecNote = notesArray[(notePosition+5)%7];


        return [paecOctave, paecNote];
    }

    this.getAccidentalPAEC = function(context, noteElement, isRest, note, lastAccidentalByNote, accidental, notesArray)
    {
        if(isRest || noteElement.qtyAccidental == 0)
        {
            return "";
        }

        return context.incipit.getPAECByName(accidental.name);  
    }

    this.TransformIncipitToPAEC = function(context)
    {
        var paec                 = "";
        var var031g              = "";
        var var031n              = "";
        var var031o              = ""; //It is not working
        var var031p              = "";

        var lastPositionY        = 14;
        var lastRythm            = "";
        var clef                 = "treble";
        var lastAccidentalByNote = ["", "", "", "", "", "", ""];
        var notesArray           = [ "B", "A", "G", "F", "E", "D", "C"];
        var lastOctave           = "";

        for(var i = 0; i < context.drawIncipitElements.length; i++)
        {
            var note            = context.incipit.getNoteByName(context.drawIncipitElements[i].noteName);
            var accidental      = context.incipit.getAccidentalByName(context.drawIncipitElements[i].accidentalName);

            var paecNote        = "";
            var paecAccidental  = "";
            var paecOctave      = "";
            var paecRythm       = "";
            var paecLastNote    = "";

            if(context.drawIncipitElements[i].isClef)
            {
                clef = note.name;
                paecNote = context.incipit.getPAECByName(note.name);

                if(context.drawIncipitElements[i].qtyAccidental > 0)
                {
                    paecAccidental = context.incipit.getPAECByName(accidental.name);

                    for(var j = 0; j < context.drawIncipitElements[i].qtyAccidental; j++)
                    {
                        if(accidental.name == "bemol")
                        {
                            if(j == 0) paecAccidental += "B";
                            if(j == 1) paecAccidental += "E";
                            if(j == 2) paecAccidental += "A";
                            if(j == 3) paecAccidental += "D";
                            if(j == 4) paecAccidental += "G";
                            if(j == 5) paecAccidental += "C";
                            if(j == 6) paecAccidental += "F";
                        }

                        if(accidental.name == "sostenido")
                        {
                            if(j == 0) paecAccidental += "F";
                            if(j == 1) paecAccidental += "C";
                            if(j == 2) paecAccidental += "G";
                            if(j == 3) paecAccidental += "D";
                            if(j == 4) paecAccidental += "A";
                            if(j == 5) paecAccidental += "E";
                            if(j == 6) paecAccidental += "B";
                        }
                    }

                    var031n = paecAccidental;
                    paec += "$"+paecAccidental;
                }
                paec += paecNote + " ";
                var031g = paecNote.substring(1, 4);
            }
            else
            {
                paecRythm = context.getRythmPAEC(context, 
                                                context.drawIncipitElements[i], 
                                                note);

                if(lastRythm == paecRythm)
                {
                    paecRythm = "";
                }
                else 
                {
                    lastRythm = paecRythm;
                }

                var octaveRythm = context.getOctaveNotePAEC(context, 
                                                            context.drawIncipitElements[i], 
                                                            note.isRest, 
                                                            clef);

                if(lastOctave == octaveRythm[0])
                {
                    octaveRythm[0] = "";
                }
                else
                {
                    lastOctave = octaveRythm[0];
                }

                paecOctave  = octaveRythm[0];
                paecNote    = octaveRythm[1];

                paecAccidental = context.getAccidentalPAEC(context, 
                                                        context.drawIncipitElements[i],
                                                        note.isRest,
                                                        octaveRythm[1],
                                                        lastAccidentalByNote,
                                                        accidental,
                                                        notesArray);       

                var031p += paecOctave+paecAccidental+paecRythm+paecNote;
                paec += paecOctave+paecAccidental+paecRythm+paecNote;
            }
        }

        if(!context.search_mode)
        {
            $("#incipitPaec").val(paec);
            $("#incipitTransposition").val(paec);

            $("#031g").val(var031g);
            $("#031n").val(var031n);
            $("#031o").val(var031o);
            $("#031p").val(var031p);
            $("#0312").val("pe");

            $("#031g").trigger("change");
            $("#031n").trigger("change");
            $("#031o").trigger("change");
            $("#031p").trigger("change");
            $("#0312").trigger("change");
        }
    }
    /*ENDREGION*/
    /*REGION Transform PAEC to Incipit */
    this.TransformPAECToIncipit = function (context, paec)
    {
        context.drawIncipitElements.splice(0, context.drawIncipitElements.length);

        var xPosition   = 0;
        var octave      = "";
        var noteName    = "treble";
        var currentClef = "treble";
        var hasDot      = false;    

        for(var index = 0; index < paec.length; index++)
        {
            var noteAccClefDot  = null;

            var yPosition       = 0;
            var qtyAccidental   = 0;
            var accidentalName  = "becuadro";
            var invertida       = false;
            var isClef          = false;

            if(paec[index] == "$") //Armadura de clave
            {
                noteAccClefDot = context.incipit.getNoteByPAEC(paec[index + 1]);
                accidentalName = noteAccClefDot.name;
                index = index + 2;

                while( paec[index] != "%")
                {
                    qtyAccidental = qtyAccidental + 1;
                    index++;
                }
            }

            if(paec[index] == "%") // clave
            {
                isClef          = true;
                noteAccClefDot  = context.incipit.getNoteByPAEC(paec.substring(index, index + 4));
                noteName        = noteAccClefDot.name;
                currentClef     = noteAccClefDot.name;
                yPosition       = noteAccClefDot.yPosition;

                index           = index + 4; //4 for the cleft
            }

            if(paec[index] == "'" || paec[index] == ",") //octava
            {
                var tempIndex = 0;

                while(paec[index + tempIndex] == "'" || paec[index + tempIndex] == ",")
                {
                    tempIndex++;
                }

                octave = paec.substring(index, index+tempIndex);
                index = index + tempIndex;
            }

            if(paec[index] == "x" || paec[index] == "b" || paec[index] == "n") //ACCIDENTAL de nota
            {
                var paecAccidental = paec[index];

                index = index + 1;

                if(paec[index] == "x" || paec[index] == "b")
                {
                    paecAccidental = paecAccidental + paec[index];
                    index = index + 1;
                }

                noteAccClefDot  = context.incipit.getNoteByPAEC(paecAccidental);
                accidentalName  = noteAccClefDot.name;
                qtyAccidental   = 1;
            }

            if(paec[index] == "0" || paec[index] == "1" || paec[index] == "2" || paec[index] == "3" 
                || paec[index] == "4" || paec[index] == "5" || paec[index] == "6" || paec[index] == "7" 
                || paec[index] == "8" || paec[index] == "9") //if paec[index] is a number
            {
                var paecRythm = paec[index];
                hasDot = false;

                index = index +1;

                if(paec[index] == ".")
                {
                    hasDot = true;
                    index = index + 1;
                }

                if(paec[index] == "-")
                {
                    paecRythm = paecRythm + paec[index];
                    index = index + 1;
                }
                noteAccClefDot = context.incipit.getNoteByPAEC(paecRythm);
                noteName = noteAccClefDot.name;
            }

            if(paec[index] == "A" || paec[index] == "B" || paec[index] == "C" 
                || paec[index] == "D" || paec[index] == "E" || paec[index] == "F" || paec[index] == "G")
            {
                var notesArray           = [ "B", "A", "G", "F", "E", "D", "C"];
                var position = 0;
                var i = 0;
                // 19 notes the incipit can represent, 31 notes can mean
                //'''DC''BAGFEDC'BAGFEDC,BAG                 Treble
                //         ''EDC'BAGFEDC,BAGFEDC,,BA         Alto
                //                 'FEDC,BAGFEDC,,BAFEDC,,,B Bass
                //'''DC''BAGFEDC'BAGFEDC,BAGFEDC,,BAFEDC,,,B

                while(paec[index] != notesArray[i])
                {
                    i++
                }

                if(octave == "'''")        position = - 5;
                else if(octave == "''")    position = 2;
                else if(octave == "'")     position = 9;
                else if(octave == ",")     position = 16;
                else if(octave == ",,")    position = 23;
                else if(octave == ",,,")   position = 30;

                position = position + i;

                if(currentClef == "treble") position-=0;
                if(currentClef == "alto")   position-=6;
                if(currentClef == "bass")   position-=12;

                yPosition = position;
            }

            context.insertElement(context,
                                noteName,
                                xPosition,
                                yPosition,
                                hasDot,
                                qtyAccidental,
                                accidentalName,
                                invertida,
                                isClef);
            
            xPosition = xPosition + 1;
        }
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
function initializeIncipit(canvasElement, search_mode) 
{

    CanvasIncipit.initializeCanvas(canvasElement, search_mode);

    CanvasIncipit.drawPentagram(CanvasIncipit);
};
