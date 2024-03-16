
    function toggleSlider() {
    const slider = document.getElementById('slider');
    const sliderWidth = slider.offsetWidth;
    const currentRight = getComputedStyle(slider).right;

    if (currentRight === '0px' || currentRight === 'auto') {
        slider.style.right = `-${sliderWidth}px`;
    } else {
        slider.style.right = '0';
    }
}