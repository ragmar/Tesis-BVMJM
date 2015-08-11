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

    this.insideElements = new Array();
    this.logicalPlace   = new Array();
    this.noteType       = new Array();
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

        context.noteType.push(context.incipit.getNoteByName("clef"));
        context.insideElements.push(0);
        context.logicalPlace.push(context.step*15); //15 for normal clef
    };

    //Cursor position on cavnas
    this.getCursorPosition = function(context, event) 
    {
        var rect = context.gCanvasElement.getBoundingClientRect();

        console.log(context.gCanvasElement);
        var x = Math.round((event.clientX-rect.left)/(rect.right-rect.left)*context.gCanvasElement.width);
        var y = Math.round((event.clientY-rect.top)/(rect.bottom-rect.top)*context.gCanvasElement.height);

        var cursor = new Array(Math.floor(x/50), Math.floor(y/context.step));


        //console.log("x y");
        //console.log(x,y);
        var cursor = new Array(Math.floor(x/50), Math.floor(y/context.step));

        //console.log("cursor");
        //console.log(cursor);
        
        if(cursor[1] > context.maxSetpY)
        {
            cursor[1] = context.maxSetpY;
        }

        if(cursor[1] < context.minSetpY)
        {
            cursor[1] = context.minSetpY;
        }

        /* returns Cell with .row and .column properties */
        /*
        var x;
        var y;
        if (event.pageX != undefined && event.pageY != undefined) 
        {
            x = event.pageX;
            y = event.pageY;
        }
        else 
        {
            x = event.clientX + document.body.scrollLeft + document.documentElement.scrollLeft;
            y = event.clientY + document.body.scrollTop + document.documentElement.scrollTop;
        }

        x -= context.gCanvasElement.offsetLeft;
        y -= context.gCanvasElement.offsetTop;

        x = Math.min(x, context.gCanvasElement.width * 50);
        y = Math.min(y, context.gCanvasElement.height * context.step);

        console.log("x y");
        console.log(x,y);
        var cursor = new Array(Math.floor(x/50), Math.floor(y/context.step));

        console.log("cursor");
        console.log(cursor);
        
        if(cursor[1] > context.maxSetpY)
        {
            cursor[1] = context.maxSetpY;
        }

        if(cursor[1] < context.minSetpY)
        {
            cursor[1] = context.minSetpY;
        }
        console.log("cursor limited");
        console.log(cursor);*/
        return cursor;
    };


    this.drawingCoordToLogicalCoord = function(drawingCoordX, drawingCoordY)
    {
        var logicalCoord = new Array();

        logicalCoord.push(drawingCoordY * this.step - (this.step * 6) + 2)
    };

    this.logicalCoordToDrawingCoord = function(logicalCoordX, logicalCoordY)
    {
        var drawingCoord = new Array();
    };


    //Click on an Existing Element on the current canvas
    this.clickExistingElement = function(context, cursor)
    {
        if(cursor[0] <= context.insideElements.length - 1)
        {
            noteSelected = cursor[0];
            return true;
        }

        noteSelected = context.insideElements.length;
        return false;
    };


    this.addNote = function(context, cursor) 
    {   
        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);
        context.drawingCoordToLogicalCoord(cursor[0],cursor[1]);

        var note = context.getCurrentNotePressed(context);

        if(note != null)
        {
            context.noteType.push(note);
            context.insideElements.push(context.insideElements.length * 50);
            context.logicalPlace.push(cursor[1] * context.step - (context.step * 6) + 2);
        }

        context.drawPentagram(context);
    };

    this.showNote = function(context, cursor) 
    {
        context.gDrawingContext.clearRect(0, 0, context.gCanvasElement.width, context.gCanvasElement.height);

        var note = context.getCurrentNotePressed(context);

        if(cursor[0] > context.insideElements.length - 1 && note != null)
        {
            context.gDrawingContext.fillStyle = "black";
            context.gDrawingContext.font = note.font;
            context.gDrawingContext.fillText(note.value, context.insideElements.length*50, cursor[1] * context.step - (context.step * 6) + 2);
        }

        context.drawPentagram(context);
    };

    //Returns the note selected on the table
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
        for(var i=0; i < context.insideElements.length; i++)
        {
            context.gDrawingContext.fillStyle = "black";
            if(i == noteSelected)
            {
                context.gDrawingContext.fillStyle = "orange";
            }
            
            context.gDrawingContext.font = context.noteType[i].font;
            context.gDrawingContext.fillText(context.noteType[i].value, context.insideElements[i], context.logicalPlace[i]);
        }

        context.gDrawingContext.stroke();
        /* FINISH DRAWING PENTAGRAM */

        /* MALLADO */
        if(dibujarMallado)
        {
            context.gDrawingContext.beginPath();
            context.gDrawingContext.lineWidth="1";

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
    };
    /*ENDREGION*/
    /*ENDREGION*/
}

var CanvasIncipit = new CanvasClass();

//Recive the note to currently display
function NotePressed(note)
{
    currenteNotePressed = note;
};


function initializeIncipit(canvasElement) {

    CanvasIncipit.initializeCanvas(canvasElement);

    CanvasIncipit.drawPentagram(CanvasIncipit);
}
