class SmartphoneResponsivo {
    constructor () {
        this.toggle();
    }

    toggle() {
        const iconSmartphone = document.getElementById("buttonSmartphoneRsl");

        if (typeof iconSmartphone !== 'undefined') {
            iconSmartphone.addEventListener('click', () => {
                
                const navSmartphone = document.getElementById("navsmartphone");

                console.log(navSmartphone);

                if (navSmartphone.classList.contains("dsp-block")) {
                    navSmartphone.classList.remove("dsp-block");
                    navSmartphone.classList.add("dsp-none");
                } else if (navSmartphone.classList.contains("dsp-none")) {
                    navSmartphone.classList.remove("dsp-none");
                    navSmartphone.classList.add("dsp-block");
                } 
            });
        } else {
            return;
        }
    }
}

new SmartphoneResponsivo;

