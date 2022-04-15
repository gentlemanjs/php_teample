const sliderWrap = document.querySelector(".slider__wrap");
        const sliderImg = document.querySelector(".slider__img");       // 이미지 보이는 영역
        const sliderInner = document.querySelector(".slider__inner");   // 이미지 움직이는 구간
        const slider = document.querySelectorAll(".slider");            // 5개의 이미지
        const sliderBtn = document.querySelector(".slider__btn");            // 5개의 이미지
        const sliderBtnPrev = sliderBtn.querySelector(".prev");            // 이전
        const sliderBtnNext = sliderBtn.querySelector(".next");            // 다음
        const sliderDot = document.querySelector(".slider__dot");            // 5개의 이미지
        
        let currentIndex = 0;
        let sliderWidth = 100;
        let sliderLength = slider.length                // 이미지 갯수
        let sliderFirst = slider[0];                    // 첫번째 이미지
        let sliderLast = slider[sliderLength - 1];      // 마지막 이미지
        let cloneFirst = sliderFirst.cloneNode(true);   // 첫번째 이미지 복사
        let cloneLast = sliderLast.cloneNode(true);     // 마지막 이미지 복사
        let posInitial = "";
        let dotIndex = "";
        let sliderTimer = "";
        let interval = 3000;
        
        // 이미지 복사 appendChild (뒤에 붙이기)  // append / prepend + to
        sliderInner.appendChild(cloneFirst);
        sliderInner.insertBefore(cloneLast, sliderFirst);
        
        let checking = false;

        function gotoSlider(index){
            if(!checking){
                sliderInner.classList.add("transition");
                sliderInner.style.left = -sliderWidth * (index+1) + "%";
                currentIndex = index;
                checking = true;
                dotActive();
                double();
            } 
        }
        function double(){
            setTimeout(() => {
                return checking = false;
            }, 650);
        }

        // 닷 버튼
        function dotInit(){
            for(let i=0; i<sliderLength; i++){
                dotIndex += "<a href='#' class='dot'></a>"
            }
            dotIndex += "<a href='#' class='play'>play</a>";
            dotIndex += "<a href='#' class='stop show'>stop</a>";
            sliderDot.innerHTML = dotIndex;
            sliderDot.firstElementChild.classList.add("active");
        }
        dotInit();

        // 닷 버튼 활성화
        function dotActive(){
            let dotAll = document.querySelectorAll(".slider__dot .dot");
            dotAll.forEach(dot => {
                dot.classList.remove("active");             // 전체 닷 메뉴 비활성화
            })

            if(currentIndex == sliderLength) {
                dotAll[0].classList.add("active");
            } else if (currentIndex == -1) {
                dotAll[sliderLength - 1].classList.add("active");
            } else {
                dotAll[currentIndex].classList.add("active");
            }
        }
        document.querySelectorAll(".slider__dot .dot").forEach((dot, index) => {
            dot.addEventListener("click", () => {
                gotoSlider(index);
            })
        })

        function autoPlay(){
            sliderTimer = setInterval(()=>{
                gotoSlider(currentIndex + 1);
            }, interval);
        }
        autoPlay();

        function stopPlay(){
            clearInterval(sliderTimer);
        }
        
        sliderBtnPrev.addEventListener("click", ()=>{
            let prevIndex = currentIndex - 1;
            gotoSlider(prevIndex);
            stopPlay();
        });

        sliderBtnNext.addEventListener("click", ()=>{
            let nextIndex = currentIndex + 1;
            gotoSlider(nextIndex);
            stopPlay();
        });

        sliderInner.addEventListener("transitionend", ()=>{
            sliderInner.classList.remove("transition");
            if(currentIndex == -1 ){
                sliderInner.style.left = -(sliderLength * sliderWidth) + "%";
                currentIndex = sliderLength - 1;
            }
            if(currentIndex == sliderLength){
                sliderInner.style.left = -(1*sliderWidth) + "%";
                currentIndex = 0;
            }
        });

        
        sliderInner.addEventListener("mouseenter", ()=>{
            stopPlay();
        })
        sliderInner.addEventListener("mouseleave", ()=>{
            if(document.querySelector(".play").classList.contains("show")){
                stopPlay();
            } else {
                autoPlay();
            }
        })

        
        
        document.querySelector(".play").addEventListener("click", ()=>{
            document.querySelector(".play").classList.remove("show");
            document.querySelector(".stop").classList.add("show");
            autoPlay();
        })
        document.querySelector(".stop").addEventListener("click", ()=>{
            document.querySelector(".stop").classList.remove("show");
            document.querySelector(".play").classList.add("show");
            stopPlay();
        })