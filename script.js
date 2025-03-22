const canvas = document.getElementById("gameCanvas");
const ctx = canvas.getContext("2d");

canvas.width = 800;
canvas.height = 400;

const paddleWidth = 10;
const paddleHeight = 100;
const ballRadius = 10;

let playerPaddleY = (canvas.height - paddleHeight) / 2;
let aiPaddleY = (canvas.height - paddleHeight) / 2;
let ballX = canvas.width / 2;
let ballY = canvas.height / 2;
let ballSpeedX = 5;
let ballSpeedY = 5;

function drawRect(x, y, width, height, color) {
    ctx.fillStyle = color;
    ctx.fillRect(x, y, width, height);
}

function drawCircle(x, y, radius, color) {
    ctx.fillStyle = color;
    ctx.beginPath();
    ctx.arc(x, y, radius, 0, Math.PI * 2, false);
    ctx.closePath();
    ctx.fill();
}

function drawNet() {
    for (let i = 0; i < canvas.height; i += 20) {
        drawRect(canvas.width / 2 - 1, i, 2, 10, "#FFF");
    }
}

function moveBall() {
    ballX += ballSpeedX;
    ballY += ballSpeedY;

    if (ballY + ballRadius > canvas.height || ballY - ballRadius < 0) {
        ballSpeedY = -ballSpeedY;
    }

    if (ballX + ballRadius > canvas.width) {
        ballSpeedX = -ballSpeedX;
    }

    if (ballX - ballRadius < 0) {
        ballSpeedX = -ballSpeedX;
    }

    // Paddle collision
    if (ballX - ballRadius < paddleWidth) {
        if (ballY > playerPaddleY && ballY < playerPaddleY + paddleHeight) {
            ballSpeedX = -ballSpeedX;
        }
    }

    if (ballX + ballRadius > canvas.width - paddleWidth) {
        if (ballY > aiPaddleY && ballY < aiPaddleY + paddleHeight) {
            ballSpeedX = -ballSpeedX;
        }
    }
}

function movePaddles() {
    canvas.addEventListener("mousemove", (event) => {
        let rect = canvas.getBoundingClientRect();
        let root = document.documentElement;
        let mouseY = event.clientY - rect.top - root.scrollTop;
        playerPaddleY = mouseY - paddleHeight / 2;
    });

    aiPaddleY += (ballY - (aiPaddleY + paddleHeight / 2)) * 0.1;
}

function draw() {
    drawRect(0, 0, canvas.width, canvas.height, "#000");
    drawNet();
    drawRect(0, playerPaddleY, paddleWidth, paddleHeight, "#FFF");
    drawRect(canvas.width - paddleWidth, aiPaddleY, paddleWidth, paddleHeight, "#FFF");
    drawCircle(ballX, ballY, ballRadius, "#FFF");
}

function gameLoop() {
    moveBall();
    movePaddles();
    draw();
    requestAnimationFrame(gameLoop);
}

gameLoop();
