export default (ele) => {
    function resize() {
        ele.style.height = 'auto';
        ele.style.height = `${ele.scrollHeight}px`;
    }

    ele.addEventListener('input', resize);

    resize();
}
