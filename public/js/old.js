var renderer = PIXI.autoDetectRenderer(800, 600, {backgroundColor : 0x9E9E9E});
document.body.appendChild(renderer.view);

var stage = new PIXI.Container();
var suit = new PIXI.Sprite.fromImage('img/suit.png');

suit.interactive = true;
suit.buttonMode = true;
suit.anchor.set(0.5);
suit
    .on('mousedown', onDragStart)
    .on('touchstart', onDragStart)
    .on('mouseup', onDragEnd)
    .on('mouseupoutside', onDragEnd)
    .on('touchend', onDragEnd)
    .on('touchendoutside', onDragEnd)
    .on('mousemove', onDragMove)
    .on('touchmove', onDragMove);

suit.position.x = 100;
suit.position.y = 100;
stage.addChild(suit);

var suit = new PIXI.Sprite.fromImage('img/suit.png');
suit.interactive = true;
suit.buttonMode = true;
suit.anchor.set(0.5);
suit
    .on('mousedown', onDragStart)
    .on('touchstart', onDragStart)
    .on('mouseup', onDragEnd)
    .on('mouseupoutside', onDragEnd)
    .on('touchend', onDragEnd)
    .on('touchendoutside', onDragEnd)
    .on('mousemove', onDragMove)
    .on('touchmove', onDragMove);

suit.position.x = 200;
suit.position.y = 200;
stage.addChild(suit);

requestAnimationFrame(animate);

function animate() {
    requestAnimationFrame(animate);
    renderer.render(stage);
}

function onDragStart(event) {
    this.data = event.data;
    this.scale.x *= 1.2;
    this.scale.y *= 1.2;
    this.dragging = true;
}

function onDragEnd() {
    this.scale.x = 1;
    this.scale.y = 1;
    this.dragging = false;
    this.data = null;
}

function onDragMove() {
    if (this.dragging) {
        var newPosition = this.data.getLocalPosition(this.parent);
        this.position.x = newPosition.x;
        this.position.y = newPosition.y;
    }
}