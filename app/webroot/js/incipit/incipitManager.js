var currenteNotePressed = "f";
var dibujarMallado = false;
var positionNoteSelected = null;
var CanvasIncipit = new CanvasClass(); //Define the object Canvas


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
            {name: "doblesostenido",    value: "l", font: 35, xPosition: -13, yPosition: 4, paec: "xx"},
            {name: "bemol",             value: "m", font: 35, xPosition: -13, yPosition: 5, paec: "b"},
            {name: "doblebemol",        value: "n", font: 35, xPosition: -20, yPosition: 5, paec: "bb"},
            {name: "becuadro",          value: "o", font: 35, xPosition: -13, yPosition: 12, paec: "n"},
            {name: "sostenido",         value: "p", font: 35, xPosition: -13, yPosition: 11, paec: "x"}
        ];

        context.AccidentalClefPositionNote =
        [
            {name: "treble",    xPosition: 0, yPosition: 0},
            {name: "alto",      xPosition: 0, yPosition: 24},
            {name: "bass",      xPosition: 0, yPosition: 48}
        ];

        context.AccidentalClefPositionSostenido =
        [ 
            {xPosition: 50, yPosition: -6},
            {xPosition: 60, yPosition: 20},
            {xPosition: 70, yPosition: -14},
            {xPosition: 80, yPosition: 10},
            {xPosition: 90, yPosition: 36},
            {xPosition: 100, yPosition: 2},
            {xPosition: 110, yPosition: 28}
        ];

        context.AccidentalClefPositionBemol =
        [ 
            {xPosition: 50, yPosition: 5 + 17},
            {xPosition: 60, yPosition: -19 + 17},
            {xPosition: 70, yPosition: 13 + 17},
            {xPosition: 80, yPosition: -11 + 17},
            {xPosition: 90, yPosition: 21 + 17},
            {xPosition: 100, yPosition: -3 + 17},
            {xPosition: 110, yPosition: 28 + 17}
        ];

        context.DotNote =
        [
            //Accidentales
            {name: "dot",    value: "q", font: 35, xPosition: 18, yPosition: 4, paec: "."}
        ];

        context.Bar = 
        [
            {name: "barra1",              value: ";", font: 38, paec: "/", yPosition: 12, xPosition: 35},
            {name: "barra2",              value: "<", font: 38, paec: "//", yPosition: 12, xPosition: 35},
           // {name: "barra3",              value: "=", font: 38, paec: "", yPosition: 12, xPosition: 35}, //dont have PAEC
            {name: "barra4",              value: ">", font: 38, paec: "//:", yPosition: 12, xPosition: 35},
            {name: "barra6",              value: "?", font: 38, paec: "://", yPosition: 12, xPosition: 35},
            {name: "barra5",              value: "@", font: 38, paec: "://:", yPosition: 12, xPosition: 35}
        ];

        context.Time = 
        [
            {name: "tiempo1",              value: "t", font: 70, paec: "4/4",  yPosition: 6, xPosition: 50},
            {name: "tiempo2",              value: "u", font: 70, paec: "2/2",  yPosition: 6, xPosition: 50},
            {name: "tiempo3",              value: "v", font: 70, paec: "2/4",  yPosition: 6, xPosition: 50},
            {name: "tiempo4",              value: "w", font: 70, paec: "3/4",  yPosition: 6, xPosition: 50},
            {name: "tiempo5",              value: "x", font: 70, paec: "3/8",  yPosition: 6, xPosition: 50},
            {name: "tiempo6",              value: "y", font: 70, paec: "6/8",  yPosition: 6, xPosition: 50},
            {name: "tiempo7",              value: "z", font: 70, paec: "9/8",  yPosition: 6, xPosition: 50},
            {name: "tiempo8",              value: "{", font: 70, paec: "12/8", yPosition: 6, xPosition: 50},
            {name: "tiempo9",              value: "|", font: 70, paec: "3/2",  yPosition: 6, xPosition: 50}
        ]

        context.Notes = 
        [
            //Claves
            {name: "treble",   value: "1", font: 56, isRest: false, yPosition: 7, paec: "%G-2"}, //46 for clef
            {name: "alto",     value: "2", font: 56, isRest: false, yPosition: 5, paec: "%C-3"}, //46 for clef
            {name: "bass",     value: "3", font: 56, isRest: false, yPosition: 3, paec: "%F-4"}, //46 for clef

            //Notas
//            {name: "maxima",             value: "a", font: 38, isRest: false, paec: ""}, //no code in PAEC
            {name: "longa",              value: "b", font: 38, isRest: false, paec: "0"},
            {name: "breve",              value: "c", font: 38, isRest: false, paec: "9"},
            {name: "semibreve",          value: "d", font: 38, isRest: false, paec: "1"},
            {name: "minim",              value: "e", font: 38, isRest: false, paec: "2"},
            {name: "crotchet",           value: "f", font: 38, isRest: false, paec: "4"},
            {name: "quaver",             value: "g", font: 38, isRest: false, paec: "8"},
            {name: "semiquaver",         value: "h", font: 38, isRest: false, paec: "6"},
            {name: "demisemiquaver",     value: "i", font: 38, isRest: false, paec: "3"},
            {name: "hemidemisemiquaver", value: "j", font: 38, isRest: false, paec: "5"},
            

            //Silencios
//            {name: "restMax",            value: "!",  font: 38, isRest: true, yPosition: 8, paec: ""}, //no code in PAEC
            {name: "restLon",            value: "\"", font: 38, isRest: true, yPosition: 8, paec: "0-"},
            {name: "restBrev",           value: "#",  font: 38, isRest: true, yPosition: 8, paec: "9-"},
            {name: "restSemirev",        value: "$",  font: 38, isRest: true, yPosition: 8, paec: "1-"},
            {name: "restMinim",          value: "%",  font: 38, isRest: true, yPosition: 8, paec: "2-"},
            {name: "restCrotchet",       value: "&",  font: 38, isRest: true, yPosition: 8, paec: "4-"},
            {name: "restQuaver",         value: "'",  font: 38, isRest: true, yPosition: 8, paec: "8-"},
            {name: "restSemiqua",        value: "(",  font: 38, isRest: true, yPosition: 8, paec: "6-"},
            {name: "restDemsemqu",       value: ")",  font: 38, isRest: true, yPosition: 8, paec: "3-"},
            {name: "restHemdemsemqu",    value: "*",  font: 38, isRest: true, yPosition: 8, paec: "5-"}
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

    /*REGION TIME FUNCTIONS*/
    //Get the time by the name
    this.getTimeByName = function(name)
    {
        for(var i = 0; i < this.Time.length; i++)
        {
            if(this.Time[i].name === name)
            {
                return this.Time[i];
            }
        }
    }

    //Get the time by the value
    this.getTimeByValue = function(value)
    {
        for(var i = 0; i < this.Time.length; i++)
        {
            if(this.Time[i].value === value)
            {
                return this.Time[i];
            }
        }
    }
    /*END REGION*/
    /*REGION TIME FUNCTIONS*/
    //Get the note by the name
    this.getBarByName = function(name)
    {
        for(var i = 0; i < this.Bar.length; i++)
        {
            if(this.Bar[i].name === name)
            {
                return this.Bar[i];
            }
        }
    }

    //Get the time by the value
    this.getBarByValue = function(value)
    {
        for(var i = 0; i < this.Bar.length; i++)
        {
            if(this.Bar[i].value === value)
            {
                return this.Bar[i];
            }
        }
    }
    /*END REGION*/

    /*REGION ACCIDENTALS FUNCTIONS*/
    //Get the accidental by the name
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

        for(var i = 0; i < this.Time.length; i++)
        {
            if(this.Time[i].name === name)
            {
                return this.Time[i].paec;
            }
        }

        for(var i = 0; i < this.Bar.length; i++)
        {
            if(this.Bar[i].name === name)
            {
                return this.Bar[i].paec;
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

        for(var i = 0; i < this.Time.length; i++)
        {
            if(this.Time[i].paec === paec)
            {
                return this.Time[i];
            }
        }

        for(var i = 0; i < this.Bar.length; i++)
        {
            if(this.Bar[i].paec === paec)
            {
                return this.Bar[i];
            }
        }
    }
    /*ENDREGION*/
    /*ENDREGION*/
}


function CanvasClass ()
{
    //Variables
    this.gCanvasElement  = "";
    this.gDrawingContext = "";
    this.operation       = "";

    this.fontBase    = 800;                   // selected default width for canvas

    this.baseStepY    = 8;
    this.baseStepX    = 50;
    this.stepY        = 0;  //8 pixels for pixels 320 (height)
    this.stepX        = 0; //50 pixels for pixels 800 (width)
    this.maxStepY     = 29;
    this.minStepY     = 11;

    this.drawIncipitElements = new Array();
    this.incipit        = new IncipitClass();


    this.getFont = function(context, fontSize) 
    {
        var ratio = fontSize / context.fontBase;   // calc ratio
        var size = context.gCanvasElement.width * ratio;   // get font size based on current width
        return "bold "+ (size|0) + "px Maestro"
    }

    this.setStepY = function(context)
    {
        var ratio = context.baseStepY / 320;   // calc ratio
        var size = context.gCanvasElement.height * ratio;   // get font size based on current width
        context.stepY = size;
    }

    this.setStepX = function(context)
    {
        var ratio = context.baseStepX / 800;   // calc ratio
        var size  = context.gCanvasElement.width * ratio;   // get font size based on current width
        context.stepX = size;
    }

    this.ratioX = function(context, x)
    {
        var ratio = context.stepX / context.baseStepX * x;   // calc ratioX
        //var size  = context.gCanvasElement.width * ratio;   // get font size based on current width
        //context.stepX = size;
        return ratio
    }

    this.ratioY = function(context, y)
    {

        var ratio = context.stepY / context.baseStepY * y;   // calc ratioY
        //var size  = context.gCanvasElement.width * ratio;   // get font size based on current width
        //context.stepX = size;
        return ratio
    }


    /*REGION EVENTS*/
    //onClick canvas
    this.clickOnCanvas = function(context, event)
    {
        var cursor = context.getCursorPosition(context, event);

        if(!context.clickExistingElement(context, cursor.x))
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
    this.initializeCanvas = function(canvasElement, operation, paec) 
    {
        var context       = this;
        context.operation = operation;

        canvasElement = document.getElementById(canvasElement);

        if (!canvasElement) {
            canvasElement = document.createElement("incipitCanvas");
            canvasElement.id = "incipit_canvas";
            document.body.appendChild(canvasElement);
        }

        context.incipit.initializeNotesArray();

        context.gCanvasElement = canvasElement;
        context.gCanvasElement.width = canvasElement.width;
        context.gCanvasElement.height = canvasElement.height; //standard is 320

        context.setStepY(context);
        context.setStepX(context);

        context.gCanvasElement.addEventListener("click", 
                function(event) { context.clickOnCanvas(context, event) }, 
                false);
        if(operation != "list")
        {
            //set the on click function on the canvas
            //context.gCanvasElement.addEventListener("click", function(event) { context.clickOnCanvas(context, event) } , false);
            //set the mouse hover function on the canvas
            context.gCanvasElement.addEventListener("mousemove", 
                function(event) { context.hoverOnCanvas(context, event) }, 
                false);

            window.addEventListener("keypress", function(e) { context.doKeyDown(context, e) }, false );
        }

        context.gDrawingContext = context.gCanvasElement.getContext("2d");

        context.gDrawingContext.textBaseline = "top";

        if(operation == "edit")
        {
            paec = document.getElementById("incipitPaec");    
            paec = paec.value;
        }

        if(operation == "edit" || operation == "list")
        {
            context.TransformPAECToIncipit(context, paec);
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
                                    null,  //accidentalName
                                    null,  //inverted
                                    true,  //isclef
                                    null,  //hasBar
                                    null,  //barName
                                    false,  //hasTime
                                    null); //timeName
        }

        context.drawPentagram(context);
    };

    //Cursor position on cavnas
    this.getCursorPosition = function(context, event) 
    {
        var rect = context.gCanvasElement.getBoundingClientRect();
        var cursor = {x: 0, y: 0}
        var x = Math.round((event.clientX-rect.left)/(rect.right-rect.left)*context.gCanvasElement.width);
        var y = Math.round((event.clientY-rect.top)/(rect.bottom-rect.top)*context.gCanvasElement.height);

        cursor.x = Math.floor(x/context.stepX);
        cursor.y = Math.floor(y/context.stepY);
        
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
    this.clickExistingElement = function(context, element)
    {
        var up   = document.getElementById("toneUp");
        var down = document.getElementById("toneDown");

        up.style.visibility   = "hidden";
        down.style.visibility = "hidden";

        if(element <= context.drawIncipitElements.length - 1)
        {
            positionNoteSelected = element;

            if(!context.drawIncipitElements[positionNoteSelected].isClef)
            {

                var position = context.getDrawPosition(context, 
                                        context.drawIncipitElements[positionNoteSelected].xPosition, 
                                        8);


                up.style.top     = position.y - 25 + "px";
                down.style.top   = position.y + 195 + "px";

                up.style.left     = position.x + (context.stepX / 3) + "px";
                down.style.left   = position.x + (context.stepX / 3) +"px";   
            

                up.style.visibility   = "visible";
                down.style.visibility = "visible";
            }

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
                                false,  //isclef
                                null,  //hasBar
                                null,  //barName
                                false,  //hasTime
                                null); //timeName

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
                                false,                              //isClef
                                false,                              //hasBar
                                null,                               //barName
                                false,                              //hasTime
                                null);                              //timeName


            var noteToDraw = context.incipit.getNoteByName(note.name);
            var notePosition = context.getDrawPosition(context, 
                                                        tempEle.xPosition, 
                                                        tempEle.yPosition);

            context.gDrawingContext.font = context.getFont(context, noteToDraw.font);
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
                    context.TransformIncipitToPAEC(context);
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
        context.clickExistingElement(context, 0);
        if(clef != null)
        {
            context.changeNoteSelected(context, clef, true, false);
        }
    }

    //Get the time of the table currently pressed and change the time
    this.timePushed = function(context, time) 
    {
        context.clickExistingElement(context, 0);
        if(time != null)
        {
            context.addTime(context, time);
        }
    }

    //Get the time of the table currently pressed and change the time
    this.barPushed = function(context, bar) 
    {
        if(bar != null)
        {
            context.addBar(context, bar);
        }
    }
    

    //Get the note of the table currently pressed and change the note
    this.notePushed = function(context, note) 
    {
        if(positionNoteSelected != null)
        {
            context.changeNoteSelected(context, note, false);
        }
    }

    //Get the button of the table pushed and add the dot to the note
    this.dotPushed = function(context)
    {
        if(positionNoteSelected == null)
        {
            context.clickExistingElement(context, context.drawIncipitElements.length - 1);
        }

        if(positionNoteSelected != null)
        {
            context.addDot(context);
        }
    }

    //Get the accidental of the table pushed and add the accidental to the note
    this.accidentalPushed = function(context, accidental)
    {
        if(positionNoteSelected == null)
        {
            context.clickExistingElement(context, context.drawIncipitElements.length - 1);
        }

        if(positionNoteSelected != null)
        {
            context.addAccidental(context, accidental);
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

    this.addTime = function(context, currentTime)
    {
        var time = context.incipit.getTimeByValue(currentTime);

        if(positionNoteSelected != null
            && context.drawIncipitElements[positionNoteSelected].isClef)
        {
            context.drawIncipitElements[positionNoteSelected].hasTime = true;
            context.drawIncipitElements[positionNoteSelected].timeName = time.name;
            context.TransformIncipitToPAEC(context);
        }

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }

    this.addBar = function(context, currentBar)
    {
        var bar = context.incipit.getBarByValue(currentBar);

        if(positionNoteSelected == null)
        {
            positionNoteSelected = context.drawIncipitElements.length - 1;
        }

        if(positionNoteSelected != null
            && !context.drawIncipitElements[positionNoteSelected].isClef)
        {
            context.drawIncipitElements[positionNoteSelected].hasBar = true;
            context.drawIncipitElements[positionNoteSelected].barName = bar.name;
            context.TransformIncipitToPAEC(context);
        }

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
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
    this.createElement = function(context, name, xPosition, yPosition, 
        hasDot, qtyAccidental, accidentalName, invertida, isClef,
        hasBar, barName, hasTime, timeName )
    {

        if(name == null)               name             = "treble";
        if(xPosition == null)          xPosition        = 0;
        if(yPosition == null)          yPosition        = 0;
        if(hasDot == null)             hasDot           = false;
        if(qtyAccidental == null)      qtyAccidental    = 0;
        if(accidentalName == null)     accidentalName   = "becuadro";
        if(invertida == null)          invertida        = false;
        if(isClef == null)             isClef           = false;
        if(hasBar == null)             hasBar           = false;
        if(barName == null)            barName          = "barra1";
        if(hasTime == null)            hasTime          = false;
        if(timeName == null)           timeName         = "tiempo1";
        
        return(
            {
                noteName: name, 
                xPosition: xPosition,
                yPosition: yPosition,
                hasDot: hasDot,
                qtyAccidental: qtyAccidental,
                accidentalName: accidentalName,
                invertida: invertida,
                isClef: isClef,
                hasBar: hasBar,
                barName: barName,
                hasTime: hasTime,
                timeName: timeName
            });
    }

    //Insert an Element on the Incipit
    this.insertElement = function(context, name, xPosition, yPosition, 
        hasDot, qtyAccidental, accidentalName, invertida, isClef,
        hasBar, barName, hasTime, timeName)
    {   
        context.drawIncipitElements.push(context.createElement(context, 
                                                        name, 
                                                        xPosition, 
                                                        yPosition, 
                                                        hasDot, 
                                                        qtyAccidental, 
                                                        accidentalName, 
                                                        invertida,
                                                        isClef,
                                                        hasBar,
                                                        barName,
                                                        hasTime,
                                                        timeName));
    }

    //Erase an Element
    this.eraseIncipit = function(context)
    {
        context.drawIncipitElements.splice(0, context.drawIncipitElements.length);

        var clef = context.incipit.getNoteByName("treble");

        context.TransformIncipitToPAEC(context);

        context.insertElement(context, //context
                                    clef.name, //name
                                    0,     //xposition
                                    clef.yPosition,//yposition
                                    null,  //hasDot
                                    null,  //qtyAccidental
                                    null,  //accidentalName
                                    null,  //inverted
                                    true,  //isclef
                                    null,  //hasBar
                                    null,  //barName
                                    false,  //hasTime
                                    null); //timeName

        positionNoteSelected = null;


        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }

    this.eraseNote = function(context)
    {
        if(positionNoteSelected == null)
        {
            positionNoteSelected = context.drawIncipitElements.length - 1;
        }

        if(positionNoteSelected != null && positionNoteSelected > 0)
        {
            context.drawIncipitElements.splice(positionNoteSelected, 1);
            for(var i = positionNoteSelected; i < context.drawIncipitElements.length; i++)
            {
                context.drawIncipitElements[i].xPosition = i;
            }
        }

        if(positionNoteSelected == 0)
        {
            context.drawIncipitElements[positionNoteSelected].hasDot           = false;
            context.drawIncipitElements[positionNoteSelected].qtyAccidental    = 0;
            context.drawIncipitElements[positionNoteSelected].accidentalName   = "becuadro";
            context.drawIncipitElements[positionNoteSelected].invertida        = false;
            context.drawIncipitElements[positionNoteSelected].isClef           = true;
            context.drawIncipitElements[positionNoteSelected].hasBar           = false;
            context.drawIncipitElements[positionNoteSelected].barName          = "barra1";
            context.drawIncipitElements[positionNoteSelected].hasTime          = false;
            context.drawIncipitElements[positionNoteSelected].timeName         = "tiempo1";
        }

        positionNoteSelected = null;

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);

        context.TransformIncipitToPAEC(context);
    }

    /*REGION DRAW*/
    //functions that returns the drawing coords of the element
    this.getDrawPosition = function(context, elementX, elementY)
    {

        var positionX = elementX * context.stepX;

        /*yPosition is between 0 and 18, we multiply by StepY to draw it on the clicked position, but 
        the StepY cause problems not drawing the Note head on the position, that is why the substract
        step*6 + pixelsToAdd occurs, to set it on the mouse position */
        var pixelsToAdd = 2;
        if(context.operation == "list") pixelsToAdd = 0.5;
        var positionY = (elementY + context.minStepY) * context.stepY - (context.stepY * 6) + pixelsToAdd;

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

        var halfScreenYpx = context.gCanvasElement.height / 2; //Half screen y pixels
        /* DRAWING PENTAGRAM */

        //Drawing the 5 lines of pentragram
        for(var i=-2, qty = 2; i<=2; i++)
        {
            var pixelsToAdd = context.stepY * qty * i + context.stepY / 2;
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
            var notePosition = context.getDrawPosition(context, 
                                                        context.drawIncipitElements[i].xPosition, 
                                                        context.drawIncipitElements[i].yPosition);

            if(context.drawIncipitElements[i].qtyAccidental > 0 && !noteToDraw.isRest)
            {
                var accidental = context.incipit.getAccidentalByName(context.drawIncipitElements[i].accidentalName);

                if(context.drawIncipitElements[i].isClef)
                {

                    for(var j=0; j < context.drawIncipitElements[i].qtyAccidental; j++)
                    {
                        var positionAccidental = [x = 0, y = 0];
                        var diferentClef = 0;

                        if(accidental.name == "sostenido")
                        {
                            positionAccidental.x = context.incipit.AccidentalClefPositionSostenido[j].xPosition;
                            positionAccidental.y = context.incipit.AccidentalClefPositionSostenido[j].yPosition;
                        }

                        if(accidental.name == "bemol")
                        {
                            positionAccidental.x = context.incipit.AccidentalClefPositionBemol[j].xPosition;
                            positionAccidental.y = context.incipit.AccidentalClefPositionBemol[j].yPosition;
                        }

                        for(var k = 0; k < context.incipit.AccidentalClefPositionNote.length; k++)
                        {
                            if(context.incipit.AccidentalClefPositionNote[k].name == noteToDraw.name)
                            {
                                diferentClef = context.incipit.AccidentalClefPositionNote[k].yPosition;    
                            }
                        }
                        

                        context.gDrawingContext.font = context.getFont(context, accidental.font);
                        context.gDrawingContext.fillText(accidental.value, 
                                                        notePosition.x + context.ratioX(context, positionAccidental.x), 
                                                        notePosition.y + context.ratioY(context, diferentClef)
                                                        + context.ratioY(context, positionAccidental.y));
                    }
                }
                else
                {
                    context.gDrawingContext.font = context.getFont(context, accidental.font);
                    context.gDrawingContext.fillText(accidental.value, 
                                                    notePosition.x + context.ratioX(context, accidental.xPosition), 
                                                    notePosition.y + context.ratioY(context, accidental.yPosition));
                }
            }

            if(context.drawIncipitElements[i].hasDot && !noteToDraw.isRest)
            {
                var dot = context.incipit.DotNote[0];

                context.gDrawingContext.font = context.getFont(context, dot.font);
                context.gDrawingContext.fillText(dot.value, 
                                                notePosition.x + context.ratioX(context, dot.xPosition), 
                                                notePosition.y + dot.yPosition);
            }

            if(context.drawIncipitElements[i].hasTime && context.drawIncipitElements[i].isClef)
            {
                
                var time = context.incipit.getTimeByName(context.drawIncipitElements[i].timeName);

                var timePosition = context.getDrawPosition(context, 
                                                        context.drawIncipitElements[i].xPosition, 
                                                        time.yPosition);

                context.gDrawingContext.font = context.getFont(context, time.font);
                context.gDrawingContext.fillText(time.value, 
                                                context.ratioX(context, time.xPosition) + timePosition.x, 
                                                timePosition.y);
            }

            if(context.drawIncipitElements[i].hasBar && !context.drawIncipitElements[i].isClef)
            {
                
                var bar = context.incipit.getBarByName(context.drawIncipitElements[i].barName);

                var barPosition = context.getDrawPosition(context, 
                                                        context.drawIncipitElements[i].xPosition, 
                                                        bar.yPosition);

                context.gDrawingContext.font = context.getFont(context, bar.font);
                context.gDrawingContext.fillText(bar.value, 
                                                context.ratioX(context, bar.xPosition) + barPosition.x, 
                                                barPosition.y);
            }

            context.gDrawingContext.font = context.getFont(context, noteToDraw.font);
            context.gDrawingContext.fillText(noteToDraw.value, 
                                            notePosition.x, 
                                            notePosition.y);
        }

        if(context.operation == "list")
        {
            context.gDrawingContext.scale(0.5,0.5);
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
                if(i % context.stepX == 0)
                {
                    if( i % context.stepX == 0)
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
    /*REGION TRANSPOSITION*/
    this.getTransposition = function(lastOctave, lastNote, lastAccidental, 
                                currentOctave, currentNote, currentAccidental, 
                                clefAccQty, clefAcc)
    {

        if((lastNote != "A" && lastNote != "B" && lastNote != "C" && lastNote != "D"
            && lastNote != "E" && lastNote != "F" && lastNote != "G")
            || currentNote != "A" && currentNote != "B" && currentNote != "C" && currentNote != "D"
            && currentNote != "E" && currentNote != "F" && currentNote != "G")
        {
            return "";
        }

        var Notes               = ["C", "D", "E", "F", "G", "A", "B"];
        var NotesValue        = [ 2, 2, 1, 2, 2, 2, 1];
        var Octaves             = [",,,", ",,", ",", "'", "''", "'''"];

        var lastNoteIndex       = 0;
        var currentNoteIndex    = 0;

        var HigherNote          = 0;

        var lastOctaveIndex     = 0;
        var currentOctaveIndex  = 0;
        var transposition       = "";
        var ascDesc             = "";
                           /* if(j == 0) paecAccidental += "B";
                            if(j == 1) paecAccidental += "E";
                            if(j == 2) paecAccidental += "A";
                            if(j == 3) paecAccidental += "D";
                            if(j == 4) paecAccidental += "G";
                            if(j == 5) paecAccidental += "C";
                            if(j == 6) paecAccidental += "F";

                            if(j == 0) paecAccidental += "F";
                            if(j == 1) paecAccidental += "C";
                            if(j == 2) paecAccidental += "G";
                            if(j == 3) paecAccidental += "D";
                            if(j == 4) paecAccidental += "A";
                            if(j == 5) paecAccidental += "E";
                            if(j == 6) paecAccidental += "B";*/

        if(clefAccQty > 0)
        {
            if(clefAcc == "sostenido")
            {
                var accidental = 3; // start F
                for(var i = 0; i < clefAccQty; i++)
                {
                    var tempValue = accidental;
                    NotesValue[tempValue] -=  1;
                    if(accidental - 1 < 0) tempValue = 7;

                    NotesValue[tempValue - 1] += 1;
                    accidental = (accidental + 4) % 7;
                }
            }
            else
            {
                var accidental = 6; // start B
                for(var i = 0; i < clefAccQty; i++)
                {
                    var tempValue = accidental;
                    NotesValue[tempValue] +=  1;

                    if(accidental - 1 < 0) tempValue = 7;

                    NotesValue[tempValue - 1] -= 1;
                    accidental = accidental - 4;

                    if(accidental < 0) accidental = 7 + accidental;
                }
            }
        }

        for(var i = 0;i < 7; i++)
        {
            if(lastNote == Notes[i])
            {
                lastNoteIndex = i;
            }

            if(currentNote == Notes[i])
            {
                currentNoteIndex = i;
            }
        }

        for(var i = 0;i < 6; i++)
        {
            if(lastOctave == Octaves[i])
            {
                lastOctaveIndex = i;
            }

            if(currentOctave == Octaves[i])
            {
                currentOctaveIndex = i;
            }
        }

        var difOctaves = 0;
        var difNotes   = 0

        difOctaves = lastOctaveIndex - currentOctaveIndex; //Negative up, positive down, 0 equal

        for (var i = lastNoteIndex; i != currentNoteIndex; i = (i + 1) % 7)
        {
            difNotes += NotesValue[i];
        }

        if(difOctaves <= 0)
        {
            ascDesc = "A";
            difOctaves = difOctaves * (-1);
            difNotes = difNotes + (difOctaves * 12);

            if(lastNoteIndex > currentNoteIndex)
            {
                difNotes = difNotes - 12;
                if(difOctaves == 0)
                {
                    ascDesc = "D";
                    difNotes = difNotes * -1;
                }
            }
        }
        else if(difOctaves > 0)
        {
            ascDesc = "D";
            if(lastNoteIndex <= currentNoteIndex)
            {
                difNotes = (difOctaves * 12) - difNotes;
            }else
            {
                difNotes = ((difOctaves + 1) * 12) - difNotes;
            }
        }

        transposition =difNotes.toString() + ascDesc;

        return transposition;
        //12 una octava

    }
    /*EDREGION*/
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
        var paecOctave      = "";
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
        var var031o              = "nd"; //nd marking no present
        var var031p              = "";

        var lastPositionY        = 14;
        var lastRythm            = "";
        var clef                 = "treble";
        var lastAccidentalByNote = ["", "", "", "", "", "", ""];
        var notesArray           = [ "B", "A", "G", "F", "E", "D", "C"];
        var lastOctave           = "";
        var lastOctaveUsed       = "";
        var paecLastNote         = "";
        var paecLastAcc          = "";
        var transposition        = "";

        for(var i = 0; i < context.drawIncipitElements.length; i++)
        {
            var note            = context.incipit.getNoteByName(context.drawIncipitElements[i].noteName);
            var accidental      = context.incipit.getAccidentalByName(context.drawIncipitElements[i].accidentalName);
            var time            = context.incipit.getTimeByName(context.drawIncipitElements[i].timeName);

            var paecNote        = "";
            var paecAccidental  = "";
            var paecOctave      = "";
            var paecRythm       = "";
            var paecTime        = "";
            var paecBar         = "";

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


                if(context.drawIncipitElements[i].hasTime)
                {
                    paecTime = context.incipit.getPAECByName(time.name);
                    var031o = paecTime;
                    paec +=  "@"+paecTime;
                }

                paec += paecNote + " ";
                var031g = paecNote.substring(1, 4);
            }
            else
            {
                if(context.drawIncipitElements[i].hasBar)
                {
                    paecBar = context.incipit.getPAECByName(context.drawIncipitElements[i].barName);
                }

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


                transposition += context.getTransposition(lastOctaveUsed, paecLastNote, paecLastAcc,
                                        lastOctave, paecNote, paecAccidental,
                                        context.drawIncipitElements[0].qtyAccidental,
                                        context.drawIncipitElements[0].accidentalName);


                var031p += paecOctave+paecAccidental+paecRythm+paecNote+paecBar;
                paec += paecOctave+paecAccidental+paecRythm+paecNote+paecBar;

                paecLastNote = paecNote;
                paecLastAcc  = paecAccidental;
                lastOctaveUsed = lastOctave;
            }
        }

        $("#incipitPaec").val(paec);
        $("#incipitTransposition").val(transposition);
        
        if(context.operation == 'add' || context.operation == 'edit')
        {
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

        if(paec == null || paec == "") return;

        var xPosition   = 0;
        var octave      = "";
        var noteName    = "treble";
        var currentClef = "treble";
        var hasDot      = false;    

        for(var index = 0; index < paec.length; index++)
        {
            var elem  = null;

            var yPosition       = 0;
            var qtyAccidental   = 0;
            var accidentalName  = "becuadro";
            var invertida       = false;
            var isClef          = false;
            var hasTime         = false;
            var timeName        = "tiempo1";
            var hasBar          = false;
            var barName         = "barra1";

            if(paec[index] == "$") //Armadura de clave
            {
                elem = context.incipit.getNoteByPAEC(paec[index + 1]);
                accidentalName = elem.name;
                index = index + 2;

                while(index < paec.length && (paec[index] != "%" && paec[index] != "@" && paec[index] != " "))
                {
                    qtyAccidental = qtyAccidental + 1;
                    index++;
                }
            }

            if(paec[index] == "@") //Armadura de clave
            {
                var paecTime = "";

                hasTime = true;
                index++;

                while(index < paec.length && (paec[index] != "%" && paec[index] != "$" && paec[index] != " "))
                {
                    paecTime += paec[index];
                    index++;
                }

                elem  = context.incipit.getNoteByPAEC(paecTime);
                timeName = elem.name;

            }

            if(paec[index] == "%") // clave
            {
                var paecClef = "%";

                isClef = true;
                index++;

                while(index < paec.length && (paec[index] != "%" && paec[index] != "$" && paec[index] != " "))
                {
                    paecClef += paec[index];
                    index++;
                }

                elem  = context.incipit.getNoteByPAEC(paecClef);
                noteName        = elem.name;
                currentClef     = elem.name;
                yPosition       = elem.yPosition;
            }

            if(paec[index] == "'" || paec[index] == ",") //octava
            {
                var tempIndex = 0;

                while(index < paec.length && (paec[index + tempIndex] == "'" || paec[index + tempIndex] == ","))
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

                elem  = context.incipit.getNoteByPAEC(paecAccidental);
                accidentalName  = elem.name;
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
                elem = context.incipit.getNoteByPAEC(paecRythm);
                noteName = elem.name;
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

            if(index+1 < paec.length && (paec[index+1] == "/" || paec[index+1] == ":"))
            {
                hasBar = true;
                var paecBar = "";

                while(index+1 < paec.length && (paec[index+1] == "/" || paec[index+1] == ":"))
                {
                    paecBar += paec[index+1];
                    index++;
                }

                elem = context.incipit.getNoteByPAEC(paecBar);
                barName = elem.name
            }

            context.insertElement(context,
                                noteName,
                                xPosition,
                                yPosition,
                                hasDot,
                                qtyAccidental,
                                accidentalName,
                                invertida,
                                isClef,  //isclef
                                hasBar,  //hasBar
                                barName,  //barName
                                hasTime,  //hasTime
                                timeName); //timeName
            
            xPosition = xPosition + 1;
        }
    }

    /*ENDREGION*/
    /*ENDREGION*/
};


//Recive the clef to currently display
function ClefPressed(clef)
{
    CanvasIncipit.clefPushed(CanvasIncipit, clef);
};

function TimePressed(time)
{
    CanvasIncipit.clefPushed(CanvasIncipit, null);
    CanvasIncipit.timePushed(CanvasIncipit, time);
};

function BarPressed(bar)
{
    CanvasIncipit.barPushed(CanvasIncipit, bar);
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

function deleteNote(all)
{
    if(all)
    {
        CanvasIncipit.eraseIncipit(CanvasIncipit);
    }else
    {
        CanvasIncipit.eraseNote(CanvasIncipit);
    }
}

//Initialize the Canvas
function initializeIncipit(canvasElement, operation, paec, canvas) 
{
    if(canvas == null)
    {
        CanvasIncipit.initializeCanvas(canvasElement, operation, paec);
    }
    else
    {
        canvas.initializeCanvas(canvasElement, operation, paec)
    }
};
