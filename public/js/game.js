var CONST = {
    SIZE: {
        WIDTH: 800,
        HEIGHT: 600
    },
    STATUS: {
        WAIT: 0,
        PLAYING: 1,
        ENDED: 2
    },
    SOCKET: {
        URL: 'ws://www.unoserver.com:3001'
    }
};

function Game()
{
    this.max = 2;
    this.status = CONST.STATUS.WAIT;

    this.players = [];

    this.main = new PIXI.Container();
    this.socket = new Socket();

    //this.graphics = new PIXI.Graphics();
}

Game.prototype.init = function()
{
    /*this.graphics.lineStyle(2, 0x000000, 0.5);
    this.graphics.drawRect(100, 150, 600, 250);
    this.graphics.lineStyle(2, 0xFF0000, 0.5);
    this.graphics.drawRect(100, 420, 600, 150);

    this.graphics.on('mouseout', function() {
            console.log('mouseout');
        })
        .on('mouseover', function() {
            console.log('mouseover');
        });

    this.main.addChild(this.graphics);*/
};

Game.prototype.act = function()
{
};

Game.prototype.wait = function()
{
};

Game.prototype.start = function()
{
};

Game.prototype.end = function()
{
};

