window.addEventListener("load", function load(){
    window.removeEventListener("load", load, false);
    deitySlider.init({
        slider: '#featured-slider',
        transitionTime: 1000,
        pauseTime: 3000,
        directionNav: true,
        pauseOnHover: true,
        captions: true
    }); },false);

var deitySlider = {

    init: function(userDefinedOptions) {
        options = userDefinedOptions;
        settings.images = document.querySelectorAll(options.slider + " > img");
        settings.stages = settings.images.length;
        slider = document.getElementById(options.slider.slice(1));

        initCaptionElement();
        initNavigation();
        initHoverEvent();
        deitySlider.cycle(); //Load first slide.

        setTimerInterval();

        function initHoverEvent() {
            if(!options.pauseOnHover) return;
            slider.addEventListener("mouseover", function() {
                clearInterval(settings.interval);
            }, false)

            slider.addEventListener("mouseout", function() {
                if (settings.interval != null)
                    setTimerInterval();
            }, false)
        }

        function initCaptionElement() {
            if (!options.captions) return;
            slider.appendChild(document.createElement("div")).className = "deity-captions";
            slider.getElementsByClassName('deity-captions')[0].innerHTML += '<div class="deity-title"></div>';
        }

        function initNavigation() {
            if(!options.directionNav) return;
            slider.appendChild(document.createElement("div")).className = "deity-directionNav";
            slider.getElementsByClassName('deity-directionNav')[0].innerHTML += '<a class="deity-prevNav">'+ options.prevText +'</a><a class="deity-nextNav">'+ options.nextText +'</a>';

            slider.getElementsByClassName('deity-prevNav')[0].addEventListener('click', function() {
                if(settings.stage > 0) settings.stage -= 2;
                else settings.stage = (settings.stages - 2);
                deitySlider.cycle("play");
                setTimerInterval();
            }, false);

            slider.getElementsByClassName('deity-nextNav')[0].addEventListener('click', function() {
                deitySlider.cycle();
                setTimerInterval();
            }, false);
        }

        function setTimerInterval() {
            if (settings.interval) { clearInterval(settings.interval) };
            settings.interval = setInterval(deitySlider.cycle, options.pauseTime);
        };

        console.log("\nslider: " + options.slider + "\npauseTime: " + options.pauseTime + "\nTransitionTime: " + options.transitionTime);
        console.log(settings.stages);
    },

    cycle: function() {
        console.log("cycle");

        var cSettings = settings;
        var cOptions = options;

        cSettings.stage = ++cSettings.stage % cSettings.stages;
        for (var i = 0, length = cSettings.stages; i < length; i++)
            cSettings.images[i].classList.add("hidden");

        cSettings.images[cSettings.stage].classList.remove("hidden");

        if(cOptions.captions)
            insertImageCaption();

        function insertImageCaption() {
            var title_text = cSettings.images[cSettings.stage].getAttribute('title');
            var description_text = '<div class="deity-description">' + cSettings.images[cSettings.stage].getAttribute('description') + '</div>';
            var title_div = slider.getElementsByClassName('deity-title')[0];

            if(title_text != null && title_text != '')
                title_div.innerHTML = title_text + description_text;
            else title_div.innerHTML = "";
        }
    }
};

var options = ({
    slider: "#deitySlider",
    pauseTime: 3000,
    transitionTime: 1000,
    directionNav: false,
    pauseOnHover: false,
    captions: false,
    prevText: 'Prev',
    nextText: 'Next',
});

var settings = ({
    stage: -1, //Starting Image
    stages: null,
    interval: null,
    images: null,
});

var slider;