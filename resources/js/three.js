import * as THREE from 'three'
import { GLTFLoader } from "three/examples/jsm/loaders/GLTFLoader.js"
import { OrbitControls } from "three/examples/jsm/controls/OrbitControls"


let scene, camera, renderer, container, gridHelper, directionalLight, Light, controls, loader;

init();

function init () {

    // Three.jsの基本設定
    container = document.getElementById('three-container');
    scene = new THREE.Scene();
    camera = new THREE.PerspectiveCamera(
        35, 
        window.innerWidth / window.innerHeight, 
        0.1, 
        1000
    );
    renderer = new THREE.WebGLRenderer({ alpha: true });

    // コンテナのサイズに合わせてレンダラーのサイズを設定
    renderer.setSize(window.innerWidth, window.innerHeight);
    container.appendChild(renderer.domElement);

    gridHelper = new THREE.GridHelper(12, 64, 0x888888, 0x666666);
    scene.add(gridHelper);

    directionalLight = new THREE.DirectionalLight(
        0xffffff,
        12
    );
    directionalLight.position.set(3, 3, 3);
    scene.add(directionalLight);

    Light = new THREE.DirectionalLight(
        0xffffff,
        4
    );
    Light.position.set(-3, -3, -3);
    scene.add(Light);

    camera.position.x = -5;
    camera.position.y = 6;
    camera.position.z = -6;

    // OrbitControlsでマウス操作を可能にする
    controls = new OrbitControls(camera, renderer.domElement);

    window.addEventListener("resize", onWindowResize);

    animate();

}


// それぞれのBladeファイルで調整をするため、windowsとしグローバル変数に変更。
// Viteを使用する方法を模索中

window.gltfModel = function (modelURL) {

    loader = new GLTFLoader();

    loader.load(modelURL, function (gltf) {

        const model = gltf.scene;
        model.scale.set(1, 1, 1);
        model.position.set(0, 0, 0);
        scene.add(model);

    });
};


// 画面サイズの変更に適用

function onWindowResize() {
    renderer.setSize(window.innerWidth, window.innerHeight);
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
}


function animate() {
    requestAnimationFrame(animate);
    renderer.render(scene, camera);
}