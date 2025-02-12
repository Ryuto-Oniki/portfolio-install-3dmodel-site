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

    // GridHelper(a, b, c, d)...Grid表示するへルパ関数
    // a...グリッドサイズ/b...グリッドの分割数/c...中心線の色/d...グリッドの色
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

    camera.position.x = -1;
    camera.position.y = 1.5;
    camera.position.z = 2;

    // OrbitControlsでマウス操作を可能にする
    controls = new OrbitControls(camera, renderer.domElement);

    window.addEventListener("resize", onWindowResize);

    animate();

}


// exportはbladeファイルでimportでこの関数を読み込ませるためにつけております
window.gltfModel = function (modelURL) {

    // ここで3Dモデルを読み込ませる設定をしております。
    loader = new GLTFLoader();

    // load()の引数にファイルパスが入ることで、指定した3Dモデルを表示できます
    loader.load(modelURL, function (gltf) {
        // gltfファイルの中のどのsceneを読み込ませるか設定しております
        // アニメーションはないのでただのsceneを読み込ませてます
        const model = gltf.scene;
        // 3dモデルのサイズを設定しております
        model.scale.set(1, 1, 1);
        // 3d空間上の場所を設定しております
        model.position.set(0, 0, 0);
        // 画面に加えて描写させております
        scene.add(model);
    });
};



function onWindowResize() {
    renderer.setSize(window.innerWidth, window.innerHeight);
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
}

function animate() {
    requestAnimationFrame(animate);
    renderer.render(scene, camera);
}