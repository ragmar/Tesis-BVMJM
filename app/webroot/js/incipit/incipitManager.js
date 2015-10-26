var currenteNotePressed = "f";
var positionNoteSelected = null;
var CanvasIncipit = new CanvasClass(); //Define the object Canvas

var isFirefox = typeof InstallTrigger !== 'undefined';   // Firefox 1.0+


function IncipitClass()
{

    /*REGION VARIABLES*/
    this.Notes = null;

    /*ENDREGION*/
    /*REGION FUNCTIONS*/

    this.initializeNotesArray = function()
    {
        var context = this;

        context.Alterations =
        [
            //Alterationes
            {name: "doblesostenido",    value: "l", font: 35, xPosition: -13, yPosition: 4, paec: "xx"},
            {name: "bemol",             value: "m", font: 35, xPosition: -13, yPosition: 5, paec: "b"},
            {name: "doblebemol",        value: "n", font: 35, xPosition: -13, yPosition: 5, paec: "bb"},
            {name: "becuadro",          value: "o", font: 35, xPosition: -13, yPosition: 12, paec: "n"},
            {name: "sostenido",         value: "p", font: 35, xPosition: -13, yPosition: 11, paec: "x"}
        ];

        context.AlterationClefPositionNote =
        [
            {name: "treble",    xPosition: 0, yPosition: 0},
            {name: "alto",      xPosition: 0, yPosition: 24},
            {name: "bass",      xPosition: 0, yPosition: 48}
        ];

        context.AlterationClefPositionSostenido =
        [ 
            {xPosition: 50, yPosition: -6},
            {xPosition: 60, yPosition: 20},
            {xPosition: 70, yPosition: -14},
            {xPosition: 80, yPosition: 10},
            {xPosition: 90, yPosition: 36},
            {xPosition: 100, yPosition: 2},
            {xPosition: 110, yPosition: 28}
        ];

        context.AlterationClefPositionBemol =
        [ 
            {xPosition: 50, yPosition: 22},
            {xPosition: 60, yPosition: -2},
            {xPosition: 70, yPosition: 30},
            {xPosition: 80, yPosition: 6},
            {xPosition: 90, yPosition: 38},
            {xPosition: 100, yPosition: 14},
            {xPosition: 110, yPosition: 45}
        ];

        context.DotNote =
        [
            //Alterationes
            {name: "dot",    value: "q", font: 35, xPosition: 18, yPosition: 4, paec: "."}
        ];

        context.Bar = 
        [
            {name: "barra1",              value: ";", font: 38, paec: "/", yPosition: 12, xPosition: 35},
            {name: "barra2",              value: "<", font: 38, paec: "//", yPosition: 12, xPosition: 35},
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

        return null;
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

        return null;
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

        return null;
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

        return null;
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

        return null;
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

        return null;
    }
    /*END REGION*/

    /*REGION ALTERATIONS FUNCTIONS*/
    //Get the alteration by the name
    this.getAlterationByName = function(name)
    {
        for(var i = 0; i < this.Alterations.length; i++)
        {
            if(this.Alterations[i].name === name)
            {
                return this.Alterations[i];
            }
        }

        return null;
    }

    //Get the note by the value
    this.getAlterationByValue = function(value)
    {
        for(var i = 0; i < this.Alterations.length; i++)
        {
            if(this.Alterations[i].value === value)
            {
                return this.Alterations[i];
            }
        }

        return null;
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

        for(var i = 0; i < this.Alterations.length; i++)
        {
            if(this.Alterations[i].name === name)
            {
                return this.Alterations[i].paec;
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

        for(var i = 0; i < this.Alterations.length; i++)
        {
            if(this.Alterations[i].paec === paec)
            {
                return this.Alterations[i];
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

        return null;
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

    this.defaultClefAlt      = new Array(21);
    this.drawXPosition       = new Array();
    this.drawIncipitElements = new Array();
    this.incipit             = new IncipitClass();


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

        var firefoxPlug = 0;
        if(isFirefox) firefoxPlug = 0;
        context.stepY = size - firefoxPlug;
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

    this.updateDrawPosition = function(context, index)
    {
        if(index == null) return;

        for(var i = index; i < context.drawXPosition.length; i++)
        {
            context.setDrawPosition(context, i, false);
        }
    }

    this.setDrawPosition = function (context, index, showNote)
    {

        if(!showNote && index > context.drawXPosition.length - 1) context.drawXPosition.push(0);
        if(!showNote && context.drawIncipitElements[index].isClef) return;

        var lastElement = context.drawIncipitElements[index - 1];
        var sumAlt = 0;
        var sumTime = 0;
        var sumBar = 0;
        var sumDot = 0;
        var sumNote = 40;
        var value = 0;

        if(lastElement.isClef)   sumNote = 60;
        if(lastElement.hasDot)   sumDot = 5;
        if(lastElement.hasTime)  sumTime = 35;
        if(lastElement.hasBar)   sumBar = 25;

        if(lastElement.qtyAlteration > 0)   
        {
            for(var i = 0; i < lastElement.qtyAlteration; i++)
            {
                sumAlt += 10;
            }
        }
        value = context.drawXPosition[index - 1] + sumNote + sumDot + sumBar + sumAlt + sumTime
        if(showNote) return value;

        context.drawXPosition[index] = value;
    }

    this.setDefaultClefAlt = function(context, clef, qtyAlteration, alterationName)
    {

        // 19 notes the incipit can represent, 31 notes can mean
        //'''DC''BAGFEDC'BAGFEDC,BAG                 Treble
        //         ''EDC'BAGFEDC,BAGFEDC,,BA         Alto
        //                 'FEDC,BAGFEDC,,BAGFEDC,,,B Bass
        //bemol BEADGCF
        //sostenido FCGDAEB

        var startPosition = 0;
        var alteration = 0;

        if(alterationName == null)
        {
            alterationName = "becuadro";
        } 

        if(alterationName == "sostenido" 
            || alterationName == "becuadro")
        {
            if(clef == "treble") startPosition = 5;
            if(clef == "alto")   startPosition = 6;
            if(clef == "bass")   startPosition = 0;

            alteration = -4;  
        } 
        if(alterationName == "bemol")
        {
            if(clef == "treble") startPosition = 2;
            if(clef == "alto")   startPosition = 3;
            if(clef == "bass")   startPosition = 5;

            alteration = 4;
        } 

        for(var i = 0; i < 7; i++)
        {
            if(i < qtyAlteration)
            {
                context.defaultClefAlt[(startPosition) % 21]       = alterationName;
                context.defaultClefAlt[(startPosition + 7) % 21]   = alterationName;
                context.defaultClefAlt[(startPosition + 14) % 21]  = alterationName;
            }else
            {
                context.defaultClefAlt[(startPosition) % 21]       = "becuadro";
                context.defaultClefAlt[(startPosition + 7) % 21]   = "becuadro";
                context.defaultClefAlt[(startPosition + 14) % 21]  = "becuadro";
            }

            startPosition = startPosition + alteration;
            if(startPosition < 0) startPosition = 21 + startPosition;
        }

        context.setNotesAlterations(context, 1, true);

    }

    this.setNotesAlterations = function (context, index, isDefault)
    {
        if(index >= context.drawIncipitElements.length) return;

        for(var i = index; i < context.drawIncipitElements.length; i++)
        {
            if(context.drawIncipitElements[i].qtyAlteration == 0)
            {
                context.drawIncipitElements[i].alterationName = context.defaultClefAlt[context.drawIncipitElements[i].yPosition];
                var yPosition = context.drawIncipitElements[i].yPosition;

                for(var j = i - 1; j > 0; j--)
                {
                    if(context.drawIncipitElements[j].hasBar) break;

                    if(yPosition == context.drawIncipitElements[j].yPosition && context.drawIncipitElements[j].qtyAlteration > 0)
                    {
                        context.drawIncipitElements[i].alterationName = context.drawIncipitElements[j].alterationName;
                        break;
                    }
                }
            }

            if(!isDefault && context.drawIncipitElements[i].hasBar) break;
        }
    }

    /*REGION EVENTS*/
    //onClick canvas
    this.clickOnCanvas = function(context, event)
    {
        var cursor = context.getCursorPosition(context, event);

        for(var i = 0; i < context.drawXPosition.length; i ++)
        {
            if(i == context.drawXPosition.length - 1)
            {
                if(cursor.x >= context.drawXPosition[i] - 10 && cursor.x < context.drawXPosition[i] + 30)
                {
                    cursor.x = i;
                }
            }
            else if(cursor.x >= context.drawXPosition[i] - 10 && cursor.x < context.drawXPosition[i + 1] - 10)
            {
                cursor.x = i;
            }
        }

        if(!context.clickExistingElement(context, cursor.x))
        {
            context.addNote(context, cursor);
        }
    };

    //onhoverCanvas
    this.hoverOnCanvas = function(context, event)
    {
        var cursor = context.getCursorPosition(context, event);

        if(cursor.x >= context.setDrawPosition(context, context.drawXPosition.length, true))
        {
            cursor.x = context.drawXPosition.length;
        }else
        {
            cursor.x = null;
        }

        context.showNote(context, cursor);
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



        if(operation != "list")
        {
            //set the on click function on the canvas
            //set the mouse hover function on the canvas
            context.gCanvasElement.addEventListener("mousemove", 
                function(event) { context.hoverOnCanvas(context, event) }, 
                false);

            context.gCanvasElement.addEventListener("click", 
                function(event) { context.clickOnCanvas(context, event) }, 
                false);
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
                                    null,  //qtyAlteration
                                    "becuadro",  //alterationName
                                    null,  //inverted
                                    true,  //isclef
                                    null,  //hasBar
                                    null,  //barName
                                    false,  //hasTime
                                    null); //timeName

            context.setDrawPosition(context, 0, false);
        }

        context.setDefaultClefAlt(context, 
                                context.drawIncipitElements[0].noteName, 
                                context.drawIncipitElements[0].qtyAlteration,
                                context.drawIncipitElements[0].alterationName);

        context.drawPentagram(context);
    };

    //Cursor position on cavnas
    this.getCursorPosition = function(context, event) 
    {
        var rect = context.gCanvasElement.getBoundingClientRect();
        var cursor = {x: 0, y: 0}
        var x = Math.round((event.clientX-rect.left)/(rect.right-rect.left)*context.gCanvasElement.width);
        var y = Math.round((event.clientY-rect.top)/(rect.bottom-rect.top)*context.gCanvasElement.height);

        cursor.x = Math.floor(x);
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

        if(element != null && element <= context.drawIncipitElements.length - 1)
        {
            positionNoteSelected = element;

            if(!context.drawIncipitElements[positionNoteSelected].isClef)
            {

                var position = context.getDrawPosition(context, 
                                        context.drawIncipitElements[positionNoteSelected].xPosition, 
                                        8);

                position.x = context.drawXPosition[positionNoteSelected];


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
        
        if(note != null && context.drawXPosition.length < 16)
        {
            var alterationName = "becuadro";
            var eleCoord = context.cursorToElement(context, cursor);

            if(note.isRest)
            {
                eleCoord.y = note.yPosition;
            }else
            {
                //calculate Alterations
                alterationName = context.defaultClefAlt[eleCoord.y];
            }

            context.insertElement(context, //context
                                note.name, //noteName
                                context.drawIncipitElements.length, //xPosition
                                eleCoord.y, //yPosition
                                null, //hasDot
                                null, //qtyAlteration
                                alterationName, //alterationName
                                false, //inverted
                                false,  //isclef
                                null,  //hasBar
                                null,  //barName
                                false,  //hasTime
                                null); //timeName

            var index = context.drawIncipitElements.length - 1

            context.setDrawPosition(context, index, false);
            context.TransformIncipitToPAEC(context);
        }

        context.drawPentagram(context);
    };

    //Show the note to be draw
    this.showNote = function(context, cursor) 
    {
        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);

        var note = context.getCurrentNotePressed(context);

        if(cursor.x > context.drawXPosition.length - 1 && context.drawXPosition.length < 16 &&  note != null)
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
                                null,                               //qtyAlteration
                                null,                               //alterationName
                                false,                              //isClef
                                false,                              //hasBar
                                null,                               //barName
                                false,                              //hasTime
                                null);                              //timeName


            var noteToDraw = context.incipit.getNoteByName(note.name);
            var notePosition = context.getDrawPosition(context, 
                                                        tempEle.xPosition, 
                                                        tempEle.yPosition);

            notePosition.x = context.setDrawPosition(context, context.drawIncipitElements.length, true);

            var tempFont = noteToDraw.value;
            if(tempEle.yPosition < 9 && !tempEle.isClef) tempFont = noteToDraw.value.toUpperCase();

            context.gDrawingContext.font = context.getFont(context, noteToDraw.font);
            context.gDrawingContext.fillText(tempFont, 
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
                    context.setNotesAlterations(context, i, false);
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

    //Get the note of the table currently pressed and change the note
    this.notePushed = function(context, note) 
    {
        if(positionNoteSelected != null)
        {
            context.changeNoteSelected(context, note, false);
        }
    }

    //Get the clef of the table currently pressed and change the clef
    this.clefPushed = function(context, clef) 
    {
        context.clickExistingElement(context, 0);
        if(clef != null)
        {
            context.changeNoteSelected(context, clef, true);
        }
    }

    //Get the time of the table currently pressed and change the time
    this.timePushed = function(context, time) 
    {
        if(positionNoteSelected == null)
        {
            context.addBar(context, time, true);
        }

        if(time != null)
        {
            context.addTime(context, time);
        }
    }

    //Get the time of the table currently pressed and change the time
    this.barPushed = function(context, bar) 
    {

        if(positionNoteSelected == null)
        {
            context.addBar(context, bar, true);
        }


        if(positionNoteSelected != null)
        {
            context.addBar(context, bar);
        }
    }
    

    //Get the button of the table pushed and add the dot to the note
    this.dotPushed = function(context)
    {
        if(positionNoteSelected == null)
        {
            context.addDot(context, true);
        }

        if(positionNoteSelected != null)
        {
            context.addDot(context);
        }
    }

    //Get the alteration of the table pushed and add the alteration to the note
    this.alterationPushed = function(context, alteration)
    {
        if(positionNoteSelected == null)
        {
            context.addAlteration(context, alteration, true);
        }

        if(positionNoteSelected != null)
        {
            context.addAlteration(context, alteration);
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

                context.drawIncipitElements[i].noteName = noteByValue.name;

                if(noteByValue.isRest || isClef)
                {
                    context.drawIncipitElements[i].yPosition = noteByValue.yPosition;
                    if(isClef)
                    {
                        context.setDefaultClefAlt(context,
                                                context.drawIncipitElements[i].noteName,
                                                context.drawIncipitElements[i].qtyAlteration,
                                                context.drawIncipitElements[i].alterationName);
                    }else
                    {
                        context.drawIncipitElements[i].qtyAlteration = 0;
                        context.drawIncipitElements[i].alterationName = "becuadro";
                    }
                }    
            }
        }

        context.TransformIncipitToPAEC(context);
        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }

    //Add the alteration on the current note
    this.addAlteration = function(context, currentAlteration, lastElement)
    {
        var alteration = context.incipit.getAlterationByValue(currentAlteration);
        //for(var i=0; i < context.drawIncipitElements.length; i++)
        //{

            if(positionNoteSelected != null || lastElement == true)
            {
                var index = context.drawIncipitElements.length - 1;
                if(positionNoteSelected != null) index = positionNoteSelected;

                if(context.incipit.getNoteByName(context.drawIncipitElements[index].noteName).isRest) return;

                if(context.drawIncipitElements[index].isClef) 
                {
                    context.drawIncipitElements[index].alterationName = "becuadro";

                    if(alteration.name != "sostenido" && alteration.name != "bemol") return;

                    context.drawIncipitElements[index].alterationName = alteration.name;

                    if(context.drawIncipitElements[index].qtyAlteration < 7)
                    {
                        context.drawIncipitElements[index].qtyAlteration += 1;

                        context.setDefaultClefAlt(context,
                                                context.drawIncipitElements[index].noteName,
                                                context.drawIncipitElements[index].qtyAlteration,
                                                alteration.name)
                    }
                }
                else
                {
                    if(context.drawIncipitElements[index].qtyAlteration == 1
                    && context.drawIncipitElements[index].alterationName == alteration.name)
                    {
                        context.drawIncipitElements[index].qtyAlteration = 0;
                        context.drawIncipitElements[index].alterationName = "becuadro";
                    }
                    else
                    {
                        context.drawIncipitElements[index].qtyAlteration = 1;
                        context.drawIncipitElements[index].alterationName = alteration.name;
                    }
                    context.setNotesAlterations(context, index, false);
                } 
                
                context.updateDrawPosition(context, index);
                context.TransformIncipitToPAEC(context);
            }
        //}

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }

    this.addTime = function(context, currentTime, lastElement)
    {
        var time = context.incipit.getTimeByValue(currentTime);

        if(positionNoteSelected != null || lastElement)
        {
            var index = context.drawIncipitElements.length - 1;
            if(positionNoteSelected != null) index = positionNoteSelected;
            if(!context.drawIncipitElements[index].isClef) return;

            if(context.drawIncipitElements[index].hasTime == false
                || context.drawIncipitElements[index].timeName != time.name)
            {
                context.drawIncipitElements[index].hasTime = true;
                context.drawIncipitElements[index].timeName = time.name;
            }
            else if(context.drawIncipitElements[index].timeName == time.name)
            {
                context.drawIncipitElements[index].hasTime = false;
            }

            context.updateDrawPosition(context, index);
            context.TransformIncipitToPAEC(context);
        }

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }

    this.addBar = function(context, currentBar, lastElement)
    {
        var bar = context.incipit.getBarByValue(currentBar);

        if(positionNoteSelected != null || lastElement == true)
        {
            var index = context.drawIncipitElements.length - 1;
            if(positionNoteSelected != null) index = positionNoteSelected;

            if(context.drawIncipitElements[index].isClef) return;

            if(context.drawIncipitElements[index].hasBar == false
                || context.drawIncipitElements[index].barName != bar.name)
            {
                context.drawIncipitElements[index].hasBar = true;
                context.drawIncipitElements[index].barName = bar.name;
                context.setNotesAlterations(context, index + 1, false);
            }
            else if(context.drawIncipitElements[index].barName == bar.name)
            {
                context.drawIncipitElements[index].hasBar = false;
                context.setNotesAlterations(context, index + 1, false);
            }

            context.updateDrawPosition(context, index);
            context.TransformIncipitToPAEC(context);
        }

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }


    //Add the alteration on the current note
    this.addDot = function(context, lastElement)
    {

        if(positionNoteSelected != null || lastElement == true)
        {
            var index = context.drawIncipitElements.length - 1;
            if(positionNoteSelected != null) index = positionNoteSelected;

            if(context.drawIncipitElements[index].isClef) return;

            context.drawIncipitElements[index].hasDot = !context.drawIncipitElements[index].hasDot;
            context.updateDrawPosition(context, index);
            context.TransformIncipitToPAEC(context);
        }
        

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }


    //Create an Element of the incipit
    this.createElement = function(context, name, xPosition, yPosition, 
        hasDot, qtyAlteration, alterationName, invertida, isClef,
        hasBar, barName, hasTime, timeName )
    {

        if(name == null)               name             = "treble";
        if(xPosition == null)          xPosition        = 0;
        if(yPosition == null)          yPosition        = 0;
        if(hasDot == null)             hasDot           = false;
        if(qtyAlteration == null)      qtyAlteration    = 0;
        if(alterationName == null)     alterationName   = null;
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
                qtyAlteration: qtyAlteration,
                alterationName: alterationName,
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
        hasDot, qtyAlteration, alterationName, invertida, isClef,
        hasBar, barName, hasTime, timeName)
    {   
        context.drawIncipitElements.push(context.createElement(context, 
                                                        name, 
                                                        xPosition, 
                                                        yPosition, 
                                                        hasDot, 
                                                        qtyAlteration, 
                                                        alterationName, 
                                                        invertida,
                                                        isClef,
                                                        hasBar,
                                                        barName,
                                                        hasTime,
                                                        timeName));
    }

    //Erase Incipit
    this.eraseIncipit = function(context)
    {
        context.drawIncipitElements.splice(0, context.drawIncipitElements.length);
        context.drawXPosition.splice(0, context.drawXPosition.length);

        var clef = context.incipit.getNoteByName("treble");

        context.TransformIncipitToPAEC(context);

        context.insertElement(context, //context
                                    clef.name, //name
                                    0,     //xposition
                                    clef.yPosition,//yposition
                                    false,  //hasDot
                                    0,  //qtyAlteration
                                    "becuadro",  //alterationName
                                    null,  //inverted
                                    true,  //isclef
                                    false,  //hasBar
                                    false,  //barName
                                    false,  //hasTime
                                    null); //timeName

        context.setDrawPosition(context, 0, false);

        context.setDefaultClefAlt(context, clef.name, 0, "becuadro");

        positionNoteSelected = null;

        context.clickExistingElement(context, null);

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);
    }

    //Erase a note
    this.eraseNote = function(context)
    {
        if(positionNoteSelected == null)
        {
            positionNoteSelected = context.drawIncipitElements.length - 1;
        }

        if(positionNoteSelected != null && positionNoteSelected > 0)
        {
            context.drawIncipitElements.splice(positionNoteSelected, 1);
            context.drawXPosition.splice(positionNoteSelected, 1);
            for(var i = positionNoteSelected; i < context.drawIncipitElements.length; i++)
            {
                context.drawIncipitElements[i].xPosition = i;
            }

            context.setNotesAlterations(context, i, false);
        }

        if(positionNoteSelected == 0)
        {
            context.drawIncipitElements[positionNoteSelected].hasDot           = false;
            context.drawIncipitElements[positionNoteSelected].qtyAlteration    = 0;
            context.drawIncipitElements[positionNoteSelected].alterationName   = "becuadro";
            context.drawIncipitElements[positionNoteSelected].invertida        = false;
            context.drawIncipitElements[positionNoteSelected].isClef           = true;
            context.drawIncipitElements[positionNoteSelected].hasBar           = false;
            context.drawIncipitElements[positionNoteSelected].barName          = "barra1";
            context.drawIncipitElements[positionNoteSelected].hasTime          = false;
            context.drawIncipitElements[positionNoteSelected].timeName         = "tiempo1";

            context.setDefaultClefAlt(context,
                                        context.drawIncipitElements[positionNoteSelected].noteName,
                                        context.drawIncipitElements[positionNoteSelected].qtyAlteration,
                                        context.drawIncipitElements[positionNoteSelected].alterationName);
        }

        context.updateDrawPosition(context, positionNoteSelected);

        positionNoteSelected = null;

        context.clickExistingElement(context, null);

        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawPentagram(context);

        context.TransformIncipitToPAEC(context);
    }

    /*REGION DRAW*/
    //functions that returns the drawing coords of the element
    this.getDrawPosition = function(context, elementX, elementY)
    {
        var positionX = elementX * context.stepX;
        var firefoxPlug = 0;
        var contextMultiplier = 6;
        if(isFirefox)
        {
            firefoxPlug = 3;
            contextMultiplier = 5;
        } 

        /*yPosition is between 0 and 18, we multiply by StepY to draw it on the clicked position, but 
        the StepY cause problems not drawing the Note head on the position, that is why the substract
        step*6 + pixelsToAdd occurs, to set it on the mouse position */
        var pixelsToAdd = 2;
        if(context.operation == "list") pixelsToAdd = 0.5;
        var positionY = (elementY + firefoxPlug + context.minStepY) * context.stepY - (context.stepY * contextMultiplier) + pixelsToAdd;

        return {x: positionX, y: positionY};

    }

    this.noteNeedLine = function(context, xPosition, yPosition)
    {

        var notePosition = context.getDrawPosition(context, 
                                                xPosition, 
                                                yPosition);
        var halfScreenYpx = context.gCanvasElement.height / 2; //Half screen y pixels
        var pixelsToAdd;
        var upOrDown = 1;

        if(yPosition < 4) upOrDown = -1;

        if(yPosition < 4 || yPosition > 14)
        {
            pixelsToAdd = context.stepY * 2 * 3 * upOrDown + context.stepY / 2;
            context.gDrawingContext.moveTo(xPosition + context.ratioX(context, - 5), halfScreenYpx + pixelsToAdd);
            context.gDrawingContext.lineTo(xPosition + context.ratioX(context, 18), halfScreenYpx + pixelsToAdd);
        }

        if(yPosition < 2 || yPosition > 16)
        {
            pixelsToAdd = context.stepY * 2 * 4 * upOrDown + context.stepY / 2;
            context.gDrawingContext.moveTo(xPosition + context.ratioX(context, - 5), halfScreenYpx + pixelsToAdd);
            context.gDrawingContext.lineTo(xPosition + context.ratioX(context, 18), halfScreenYpx + pixelsToAdd);
        }

    }
    //Main function that draw incipit
    this.drawPentagram = function(context)
    {   
        var firefoxPlug = 0; //solves firefox Drawing problem
        //Incipit.gDrawingContext.clearRect(0, 0, Incipit.gCanvasElement.width, Incipit.gCanvasElement.height);
        //Dibujo rayas pentagrama
        context.gDrawingContext.beginPath();
        context.gDrawingContext.strokeStyle="#000000";
        context.gDrawingContext.lineWidth="2";

        var halfScreenYpx = context.gCanvasElement.height / 2; //Half screen y pixels
        var pixelsToAdd;
        /* DRAWING PENTAGRAM */

        //Drawing the 5 lines of pentragram
        for(var i=-2, qty = 2; i<=2; i++)
        {
            pixelsToAdd = context.stepY * qty * i + context.stepY / 2;
            context.gDrawingContext.moveTo(0, halfScreenYpx + pixelsToAdd);
            context.gDrawingContext.lineTo(context.gCanvasElement.width, halfScreenYpx + pixelsToAdd);
        }

        //notes
        for(var i=0; i < context.drawIncipitElements.length; i++)
        {
            var noteAlteration = 0;
            var noteDot = 0;
            context.gDrawingContext.fillStyle = "black";
            if(i == positionNoteSelected)
            {
                context.gDrawingContext.fillStyle = "orange";
            }
            
            var noteToDraw = context.incipit.getNoteByName(context.drawIncipitElements[i].noteName);

            var notePosition = context.getDrawPosition(context, 
                                                        context.drawIncipitElements[i].xPosition, 
                                                        context.drawIncipitElements[i].yPosition);
            notePosition.x = context.ratioX(context,context.drawXPosition[i]);

            //Alteration
            firefoxPlug = 0;
            if(isFirefox) firefoxPlug = 2;
            if(context.drawIncipitElements[i].qtyAlteration > 0 && !noteToDraw.isRest)
            {
                var alteration = context.incipit.getAlterationByName(context.drawIncipitElements[i].alterationName);

                if(context.drawIncipitElements[i].isClef)
                {

                    for(var j=0; j < context.drawIncipitElements[i].qtyAlteration; j++)
                    {
                        var positionAlteration = [x = 0, y = 0];
                        var diferentClef = 0;

                        if(alteration.name == "sostenido")
                        {
                            positionAlteration.x = context.incipit.AlterationClefPositionSostenido[j].xPosition;
                            positionAlteration.y = context.incipit.AlterationClefPositionSostenido[j].yPosition;
                        }

                        if(alteration.name == "bemol")
                        {
                            positionAlteration.x = context.incipit.AlterationClefPositionBemol[j].xPosition;
                            positionAlteration.y = context.incipit.AlterationClefPositionBemol[j].yPosition;
                        }

                        for(var k = 0; k < context.incipit.AlterationClefPositionNote.length; k++)
                        {
                            if(context.incipit.AlterationClefPositionNote[k].name == noteToDraw.name)
                            {
                                diferentClef = context.incipit.AlterationClefPositionNote[k].yPosition;    
                            }
                        }
                        
                        noteAlteration = positionAlteration.x;
                        context.gDrawingContext.font = context.getFont(context, alteration.font);
                        context.gDrawingContext.fillText(alteration.value, 
                                                        notePosition.x + context.ratioX(context, noteAlteration), 
                                                        notePosition.y + context.ratioY(context, diferentClef)
                                                        + context.ratioY(context, positionAlteration.y - firefoxPlug));
                    }
                }
                else
                {
                    noteAlteration = alteration.xPosition;

                    context.gDrawingContext.font = context.getFont(context, alteration.font);
                    context.gDrawingContext.fillText(alteration.value, 
                                                    notePosition.x, 
                                                    notePosition.y + context.ratioY(context, alteration.yPosition - firefoxPlug));
                }
            }

            //Time (only clef)
            if(context.drawIncipitElements[i].hasTime && context.drawIncipitElements[i].isClef)
            {
                firefoxPlug = 0;
                if(isFirefox) firefoxPlug = 3.5;

                var time = context.incipit.getTimeByName(context.drawIncipitElements[i].timeName);

                var timePosition = context.getDrawPosition(context, 
                                                        context.drawIncipitElements[i].xPosition, 
                                                        time.yPosition + firefoxPlug);

                timePosition.x = context.drawIncipitElements[i].qtyAlteration * 10; 

                context.gDrawingContext.font = context.getFont(context, time.font);
                context.gDrawingContext.fillText(time.value, 
                                                context.ratioX(context, timePosition.x + time.xPosition), 
                                                timePosition.y);
            }

            //Dot
            if(context.drawIncipitElements[i].hasDot)
            {
                firefoxPlug = 0;
                if(isFirefox) firefoxPlug = 2;
                var dot = context.incipit.DotNote[0];
                noteDot = 5;

                context.gDrawingContext.font = context.getFont(context, dot.font);
                context.gDrawingContext.fillText(dot.value, 
                                                notePosition.x + context.ratioX(context, dot.xPosition - noteAlteration), 
                                                notePosition.y + dot.yPosition - firefoxPlug);
            }

            //Bar
            if(context.drawIncipitElements[i].hasBar && !context.drawIncipitElements[i].isClef)
            {
                
                var bar = context.incipit.getBarByName(context.drawIncipitElements[i].barName);

                var barPosition = context.getDrawPosition(context, 
                                                        context.drawIncipitElements[i].xPosition, 
                                                        bar.yPosition);

                barPosition.x = notePosition.x;
                firefoxPlug = 0;
                if(isFirefox) firefoxPlug = 6;

                context.gDrawingContext.font = context.getFont(context, bar.font + firefoxPlug);
                context.gDrawingContext.fillText(bar.value, 
                                                barPosition.x + context.ratioX(context, bar.xPosition + noteDot - noteAlteration),
                                                barPosition.y);
            }

            firefoxPlug = 0;
            if(context.drawIncipitElements[i].isClef)
            {
                noteAlteration = 0;
                if(isFirefox)
                {
                    firefoxPlug = 2;
                    notePosition = context.getDrawPosition(context, 
                                            context.drawIncipitElements[i].xPosition, 
                                            context.drawIncipitElements[i].yPosition + firefoxPlug);
                } 
            }else
            {
                context.noteNeedLine(context, notePosition.x - context.ratioX(context, noteAlteration), context.drawIncipitElements[i].yPosition);
            }

            var tempFont = noteToDraw.value;
            if(context.drawIncipitElements[i].yPosition < 9
                && !context.drawIncipitElements[i].isClef) tempFont = noteToDraw.value.toUpperCase();

            context.gDrawingContext.font = context.getFont(context, noteToDraw.font);
            context.gDrawingContext.fillText(tempFont, 
                                            notePosition.x - context.ratioX(context, noteAlteration), 
                                            notePosition.y + firefoxPlug);
        }

        if(context.operation == "list")
        {
            context.gDrawingContext.scale(0.5,0.5);
        }
        
        context.gDrawingContext.stroke();
    }
    /*ENDREGION*/
    /*REGION TRANSPOSITION*/
    this.getTransposition = function(lastOctave, lastNote, lastAlteration, lastPositionY,
                                currentOctave, currentNote, currentAlteration, curentPositionY,
                                clefAltQty, clefAlt)
    {

        if((lastNote != "A" && lastNote != "B" && lastNote != "C" && lastNote != "D"
            && lastNote != "E" && lastNote != "F" && lastNote != "G")
            || currentNote != "A" && currentNote != "B" && currentNote != "C" && currentNote != "D"
            && currentNote != "E" && currentNote != "F" && currentNote != "G")
        {
            return "";
        }

        var Notes                  = ["C", "D", "E", "F", "G", "A", "B"];
        var Octaves                = [",,,", ",,", ",", "'", "''", "'''"];
        var AlterationName         = ["becuadro", "sostenido", "doblesostenido", "bemol", "doblebemol"];

        var NotesValue             = [ 2, 2, 1, 2, 2, 2, 1];
        var AlterationValue        = [0, 1, 2, -1, -2];

        var lastNoteIndex          = 0;
        var LastAlterationValue    = -1;

        var currentNoteIndex       = 0;
        var currentAlterationValue = -1;

        var lastOctaveIndex        = 0;
        var currentOctaveIndex     = 0;
        var transposition          = "";
        var ascDesc                = "";

        //getting alterations values
        for(var i = 0; i < 5; i++)
        {
            if(lastAlteration == AlterationName[i])
            {
                LastAlterationValue = i;
            }

            if(currentAlteration == AlterationName[i])
            {
                currentAlterationValue = i;
            }
        }

        //getting Notes Index
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

        //getting octave Index
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

        //note diferences with octaves
        if(difOctaves <= 0)
        {
            ascDesc = "A"; //ascendiendo
            difOctaves = difOctaves * (-1);
            difNotes = difNotes + (difOctaves * 12);

            if(lastNoteIndex > currentNoteIndex)
            {
                difNotes = difNotes - 12;
                if(difOctaves == 0)
                {
                    ascDesc = "D"; //descendiendo
                    difNotes = difNotes * -1;
                }
            }
        }
        else if(difOctaves > 0)
        {
            ascDesc = "D"; //descendiendo
            if(lastNoteIndex <= currentNoteIndex)
            {
                difNotes = (difOctaves * 12) - difNotes;
            }else
            {
                difNotes = ((difOctaves + 1) * 12) - difNotes;
            }
        }


        //including Alteration on diferences
        if(ascDesc == "D")
        {
            if(LastAlterationValue > 0)
            {
                difNotes += AlterationValue[LastAlterationValue];
            }

            if(currentAlterationValue > 0)
            {
                difNotes += AlterationValue[currentAlterationValue] * -1;
            }
        }
        else if(ascDesc == "A")
        {
            if(LastAlterationValue > 0)
            {
                difNotes += AlterationValue[LastAlterationValue] * -1;
            }
            else if(LastAlterationValue == 0)
            {

            }

            if(currentAlterationValue > 0)
            {
                difNotes += AlterationValue[currentAlterationValue];
            }
        }

        //miss cause by alterations
        if(difNotes <= 0)
        {
            difNotes = difNotes * -1;

            if(ascDesc == "D" || difNotes == 0)
            {
                ascDesc = "A";
            }else
            {
                ascDesc = "D";
            }
        }

        transposition = difNotes.toString() + ascDesc;

        return transposition;
        //12 una octava

    }
    /*EDREGION*/
    /*REGION INCIPIT TO PLAINE & EASIE CODE */

    this.getRythmPAEC = function(context, noteElement, note)
    {
        var paecRythm = context.incipit.getPAECByName(note.name);

        if(note.isRest) paecRythm = paecRythm[0];
        if(noteElement.hasDot) 
        {
            paecRythm += context.incipit.getPAECByName(context.incipit.DotNote[0].name);
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

    this.getAlterationPAEC = function(context, noteElement, lastArrayAlteration)
    {
        if(noteElement.isRest || noteElement.qtyAlteration == 0)
        {
            return "";
        }

        return context.incipit.getPAECByName(noteElement.alterationName);  
    }

    this.TransformIncipitToPAEC = function(context)
    {
        var paec                 = "";
        var var031g              = "";
        var var031n              = "";
        var var031o              = "nd"; //nd marking no present
        var var031p              = "";

        var lastPositionY        = -1;
        var lastRythm            = "";
        var clef                 = "treble";
        var notesArray           = [ "B", "A", "G", "F", "E", "D", "C"];
        var lastOctave           = "";
        var lastOctaveUsed       = "";
        var paecLastNote         = "";
        var LastAltName          = "";
        var transposition        = "";

        //search variables
        var paecNoClef           = "";
        var paecNoRythm          = "";
        var paecNoOctave         = "";
        var paecNoAlteration     = "";

        var lastAlterationArray = new Array(21);

        for(var i = 0; i < 21; i++)
        {
            lastAlterationArray[i] = context.defaultClefAlt[i];
        }


        for(var i = 0; i < context.drawIncipitElements.length; i++)
        {
            var note            = context.incipit.getNoteByName(context.drawIncipitElements[i].noteName);
            var alteration      = context.incipit.getAlterationByName(context.drawIncipitElements[i].alterationName);
            var time            = context.incipit.getTimeByName(context.drawIncipitElements[i].timeName);

            var paecNote        = "";
            var paecAlteration  = "";
            var paecOctave      = "";
            var paecRythm       = "";
            var paecTime        = "";
            var paecBar         = "";

            if(context.drawIncipitElements[i].isClef)
            {

                clef = note.name;
                paecNote = context.incipit.getPAECByName(note.name);

                if(context.drawIncipitElements[i].qtyAlteration > 0)
                {
                    paecAlteration = context.incipit.getPAECByName(alteration.name);

                    for(var j = 0; j < context.drawIncipitElements[i].qtyAlteration; j++)
                    {
                        if(alteration.name == "bemol")
                        {
                            if(j == 0) paecAlteration += "B";
                            if(j == 1) paecAlteration += "E";
                            if(j == 2) paecAlteration += "A";
                            if(j == 3) paecAlteration += "D";
                            if(j == 4) paecAlteration += "G";
                            if(j == 5) paecAlteration += "C";
                            if(j == 6) paecAlteration += "F";
                        }

                        if(alteration.name == "sostenido")
                        {
                            if(j == 0) paecAlteration += "F";
                            if(j == 1) paecAlteration += "C";
                            if(j == 2) paecAlteration += "G";
                            if(j == 3) paecAlteration += "D";
                            if(j == 4) paecAlteration += "A";
                            if(j == 5) paecAlteration += "E";
                            if(j == 6) paecAlteration += "B";
                        }
                    }

                    var031n = paecAlteration;
                    paec += "$"+paecAlteration;
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

                if(note.isRest)
                {
                    paecNote = "-";
                    paecOctave = "";
                }else
                {
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
                }

                paecAlteration = context.getAlterationPAEC(context, 
                                                        context.drawIncipitElements[i],
                                                        lastAlterationArray);       


                var currentAltName   = context.drawIncipitElements[i].alterationName;
                var currentPositionY = context.drawIncipitElements[i].yPosition;

                transposition += context.getTransposition(
                                        lastOctaveUsed, paecLastNote, LastAltName, lastPositionY,
                                        lastOctave, paecNote, currentAltName, currentPositionY,
                                        context.drawIncipitElements[0].qtyAlteration,
                                        context.drawIncipitElements[0].alterationName);


                var031p += paecOctave+paecRythm+paecAlteration+paecNote+paecBar;
                paec += paecOctave+paecRythm+paecAlteration+paecNote+paecBar;

                paecNoClef += paecOctave+paecRythm+paecAlteration+paecNote+paecBar;

                if(!note.isRest)
                {
                    lastPositionY = context.drawIncipitElements[i].yPosition
                    paecLastNote = paecNote;
                    LastAltName  = context.drawIncipitElements[i].alterationName;
                    lastOctaveUsed = lastOctave;

                    paecNoOctave    += "[\,\'\\:]*"+paecRythm+paecAlteration+paecNote;
                    paecNoRythm     += "[0-9-\,\'\\:]*"+paecAlteration+paecNote;
                    paecNoAlteration+= "[0-9-\,\'\\:bxn]*"+paecNote;
                }
            }
        }

        $("#incipitPaec").val(paec);
        $("#incipitTransposition").val(transposition);

        if(context.operation == 'search')
        {
            console.log(paecNoClef);
            console.log(paecNoRythm);
            console.log(paecNoOctave);
            console.log(paecNoAlteration);
            $("#paecNoClef").val("."+paecNoClef +".");
            $("#paecNoOctave").val("."+paecNoOctave+".");
            $("#paecNoRythm").val("."+paecNoRythm+".");
            $("#paecNoAlteration").val("."+paecNoAlteration+".");
        }
        
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
        var paecRythm   = "";

        for(var index = 0; index < paec.length; index++)
        {
            var elem  = null;

            var yPosition       = 0;
            var qtyAlteration   = 0;
            var alterationName  = "becuadro";
            var invertida       = false;
            var isClef          = false;
            var hasTime         = false;
            var timeName        = "tiempo1";
            var hasBar          = false;
            var barName         = "barra1";

            if(paec[index] == "$") //Armadura de clave
            {
                elem = context.incipit.getNoteByPAEC(paec[index + 1]);
                alterationName = elem.name;
                index = index + 2;

                while(index < paec.length && (paec[index] != "%" && paec[index] != "@" && paec[index] != " "))
                {
                    qtyAlteration = qtyAlteration + 1;
                    index++;
                }
            }

            if(paec[index] == "@") //CIfra Indicadora de compás
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

                if(alterationName == null) alterationName = "becuadro";
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

            if(paec[index] == "0" || paec[index] == "1" || paec[index] == "2" || paec[index] == "3" 
                || paec[index] == "4" || paec[index] == "5" || paec[index] == "6" || paec[index] == "7" 
                || paec[index] == "8" || paec[index] == "9") //if paec[index] is a number
            {
                paecRythm = paec[index];
                hasDot = false;

                index = index +1;

                if(paec[index] == ".")
                {
                    hasDot = true;
                    index = index + 1;
                }
            }

            if(paec[index] == "x" || paec[index] == "b" || paec[index] == "n") //ALTERATION de nota
            {
                var paecAlteration = paec[index];

                index = index + 1;

                if(paec[index] == "x" || paec[index] == "b")
                {
                    paecAlteration = paecAlteration + paec[index];
                    index = index + 1;
                }

                elem  = context.incipit.getNoteByPAEC(paecAlteration);
                alterationName  = elem.name;
                qtyAlteration   = 1;
            }

            if(paec[index] == "A" || paec[index] == "B" || paec[index] == "C" 
                || paec[index] == "D" || paec[index] == "E" || paec[index] == "F" || paec[index] == "G"
                || paec[index] == "-")
            {
                var notesArray           = [ "B", "A", "G", "F", "E", "D", "C"];
                var position = 0;
                var i = 0;
                // 19 notes the incipit can represent, 31 notes can mean
                //'''DC''BAGFEDC'BAGFEDC,BAG                 Treble
                //         ''EDC'BAGFEDC,BAGFEDC,,BA         Alto
                //                 'FEDC,BAGFEDC,,BAFEDC,,,B Bass
                //'''DC''BAGFEDC'BAGFEDC,BAGFEDC,,BAFEDC,,,B

                if(paec[index] == "-")
                {
                    elem = context.incipit.getNoteByPAEC(paecRythm + "-");
                    position = elem.yPosition;
                }
                else
                {
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

                    elem = context.incipit.getNoteByPAEC(paecRythm);
                }

                yPosition = position;
                noteName = elem.name;

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
                                qtyAlteration,
                                alterationName,
                                invertida,
                                isClef,  //isclef
                                hasBar,  //hasBar
                                barName,  //barName
                                hasTime,  //hasTime
                                timeName); //timeName

            context.setDrawPosition(context, context.drawIncipitElements.length - 1, false);

            if(isClef)
            {
                context.setDefaultClefAlt(context, noteName, qtyAlteration, alterationName);
            }
            else
            {
                context.setNotesAlterations(context, context.drawIncipitElements.length - 1, false);
            }

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

//Recive the alteration to currently add
function alterationPressed(alteration)
{
    CanvasIncipit.alterationPushed(CanvasIncipit, alteration);
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
