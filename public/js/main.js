var renderer = PIXI.autoDetectRenderer(CONST.SIZE.WIDTH, CONST.SIZE.HEIGHT, {backgroundColor : 0x9E9E9E});
document.body.appendChild(renderer.view);

var game = new Game();
game.init();

requestAnimationFrame(animate);

function animate() {
    requestAnimationFrame(animate);
    game.act();
    renderer.render(game.main);
}