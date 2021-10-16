
const backgrHexs = [
    'gitlab_hexagon_backgr',
    'clubhouse_hexagon_backgr'
]
const hexagons = [
    'bucket_hexagon',
    'clubhouse_hexagon',
    'gitlab_hexagon',
    'zenefits_hexagon',
    'office_hexagon'
]
const scans = [
    'bucket_hexagon_scan',
    'gitlab_hexagon_scan',
    'clubhouse_hexagon_scan',
    'zenefits_hexagon_scan',
    'office_hexagon_scan'
]
const scanHexId = 'hexagon_scan';
const scanWrapId = 'hexagon_scan_wrap';


function IntegrationSvgAnimation(){
    this.styles = {
        path: 'integrations-anim__path',
        hideBackgr: 'integrations-anim__path_hidden-backgr',
        hideHexagonPoint0: 'integrations-anim__path_hexagon-point-0-hidden',
        hideScan: 'integrations-anim__path_hidden-scan',
        moveScanWrap: 'integrations-anim__path_scan-wrap-move',
        drawScanHex: 'integrations-anim__path_scan-hex-draw',
    }

    this.hexagonPoints = [
        'integrations-anim__path_hexagon-point-0',
        'integrations-anim__path_hexagon-point-1',
        'integrations-anim__path_hexagon-point-2',
        'integrations-anim__path_hexagon-point-3',
        'integrations-anim__path_hexagon-point-4',
        'integrations-anim__path_hexagon-point-5',
    ]

    this.config = {
        backgrDelay: 200,
        backgrDuration: 800,
        hexagonDelay: 200,
        hexagonDuration: 1200,
        hexagonUpDownDuration: 1000,
        scanDelay: 600,
        scanDuration: 1200,
        
        initStep: 3,
        infinite: false
    }
    
    this.svg = document.getElementById('integrations_svg');
    this.scanHex = null;
    this.scanWrap = null;
    this.backgrHexs = [];
    this.hexagons = [];
    this.scans = [];

    // all hexagons on step 0 after init
    this.currentStep = this.config.initStep;
    this.currentHexIndex = 0;
    this.scanned = false;

    
    this.initBackgr = () =>{
        if(this.backgrHexs.length === 0){
            for(let backgrId of backgrHexs){
                const backgr = this.svg.querySelector(`#${backgrId}`);
                if(backgr){
                    this.backgrHexs.push(backgr);
                }
            }
        }
        this.backgrHexs.forEach((el, index) =>{
            el.classList.add(this.styles.path, this.styles.hideBackgr);
            el.style.transitionDuration = this.config.backgrDuration + 'ms';
            el.style.transitionDelay = this.config.backgrDelay * index + 'ms';
        })
    }
    this.initHexagons = () =>{
        for(let hexId of hexagons){
            const hexagon = this.svg.querySelector(`#${hexId}`);
            if(hexagon){
                this.hexagons.push(hexagon);
            }
        }
        this.hexagons.forEach((el, index) =>{
            // el.classList.add(this.styles.path, this.hexagonPoints[0]);
            el.style.transitionDuration = this.config.hexagonUpDownDuration + 'ms';
            if(index < 3){
                el.style.transitionDelay = this.config.hexagonDelay * index + 'ms';
            }
            this.hideCheck(el);
        })
    }

    this.initScans = () =>{
        for(let scanId of scans){
            const scan = this.svg.querySelector(`#${scanId}`);
            if(scan){
                this.scans.push(scan);
            }
        }
        this.scans.forEach(el =>{
            el.classList.add(this.styles.hideScan);
            el.style.transitionDuration = this.config.scanDuration + 'ms';
        })
    }
    this.initScanHex = () =>{
        this.scanHex = this.svg.getElementById(scanHexId);
        this.scanHex.style.transitionDuration = this.config.scanDuration - 100 + 'ms';

        this.scanWrap = this.svg.getElementById(scanWrapId);
        this.scanWrap.style.transitionDuration = this.config.scanDuration * 2 + 'ms';
    }

    this.hideCheck = (hexagon) =>{
        hexagon.querySelector(`#${hexagon.id}_check`).style.opacity = 0;
    }
    this.showCheck = (hexagon) =>{
        hexagon.querySelector(`#${hexagon.id}_check`).style.opacity = null;
    }

    this.init = () =>{
        if(this.svg){
            this.initBackgr();
            this.initHexagons();
            this.initScanHex();
            this.initScans();
        }
    }

    this.showBackgr = ()=>{
        this.backgrHexs.forEach(el =>{
            el.classList.remove(this.styles.hideBackgr);
        })
    }

    this.showFirstHexagons = ()=>{
        this.hexagons.forEach((el, index) =>{
            if(index > 2)
                return

            el.classList.remove(`integrations-anim__path_hexagon-point-${2 - index}-hidden`);
        })
        return new Promise(resolve =>{
            setTimeout(()=>{
                resolve();
            }, this.config.hexagonUpDownDuration + this.config.hexagonDelay * 2 + 50);
        })
    }

    this.prepareNextHexagons = ()=>{
        let count = 0;
        if(this.hexagons[this.currentHexIndex + 1]){
            this.hexagons[this.currentHexIndex + 1].classList.add(this.hexagonPoints[2])
            this.hexagons[this.currentHexIndex + 1].style.transitionDelay = null;
            this.hexagons[this.currentHexIndex + 1].style.transitionDuration = this.config.hexagonDuration + 'ms';
        }
        else if(this.config.infinite){
            const hexId = this.currentHexIndex + 1 - this.hexagons.length;
            
            this.hexagons[hexId].classList.add(this.hexagonPoints[2])
            this.hexagons[hexId].style.transitionDelay = null;
            this.hexagons[hexId].style.transitionDuration = this.config.hexagonDuration + 'ms';
        }
        
        if(this.hexagons[this.currentHexIndex + 2]){
            this.hexagons[this.currentHexIndex + 2].classList.add(this.hexagonPoints[1])
            this.hexagons[this.currentHexIndex + 2].style.transitionDelay = this.config.hexagonDelay + 'ms';
            this.hexagons[this.currentHexIndex + 2].style.transitionDuration = this.config.hexagonDuration + 'ms';
            
            count++;
        }
        else if(this.config.infinite){
            const hexId = this.currentHexIndex + 2 - this.hexagons.length;
            
            this.hexagons[hexId].classList.add(this.hexagonPoints[1])
            this.hexagons[hexId].style.transitionDelay = this.config.hexagonDelay + 'ms';
            this.hexagons[hexId].style.transitionDuration = this.config.hexagonDuration + 'ms';
            
            count++;
        }
        
        
        if(this.hexagons[this.currentHexIndex + 3]){
            this.hexagons[this.currentHexIndex + 3].classList.remove(`${this.hexagonPoints[0]}-hidden`)
            this.hexagons[this.currentHexIndex + 3].style.transitionDelay = this.config.hexagonDelay * 2 + 'ms';
            this.hexagons[this.currentHexIndex + 3].style.transitionDuration = this.config.hexagonUpDownDuration + 'ms';
            
            count++;
        }
        else if(this.config.infinite){
            const hexId = this.currentHexIndex + 3 - this.hexagons.length;
            
            this.hexagons[hexId].classList.remove(`${this.hexagonPoints[0]}-hidden`)
            this.hexagons[hexId].style.transitionDelay = this.config.hexagonDelay * 2 + 'ms';
            this.hexagons[hexId].style.transitionDuration = this.config.hexagonUpDownDuration + 'ms';
            
            count++;
        }

        return new Promise(resolve =>{
            setTimeout(() => {
                resolve();
            }, this.config.hexagonDuration + this.config.hexagonDelay * count + 'ms');
        })
    }

    this.setHexagonToFirstPoint = (el)=>{
        this.hexagonPoints.forEach(point =>{
            el.classList.remove(point);
        })
        el.classList.add(this.hexagonPoints[0])
        el.classList.add(this.styles.hideHexagonPoint0)
        this.hideCheck(el);
    }

    this.moveHexagon = () =>{
        if(this.currentStep < this.hexagonPoints.length){
            if(this.currentStep === 3){
                this.prepareNextHexagons();

                this.hexagons[this.currentHexIndex].style.transitionDelay = null;
                this.hexagons[this.currentHexIndex].style.transitionDuration = this.config.hexagonDuration + 'ms';
                this.hexagons[this.currentHexIndex].classList.add(this.hexagonPoints[this.currentStep])
                
                this.currentStep++;

                setTimeout(()=>{
                    this.moveHexagon();
                }, this.config.hexagonDuration / 100 * 30)    
            }
            else{
                if(this.currentStep === 4 && !this.scanned){
                    this.showCheck(this.hexagons[this.currentHexIndex]);

                    const scan = this.scans.find(el => el.id.includes(this.hexagons[this.currentHexIndex].id))

                    scan.classList.remove(this.styles.hideScan);
                    this.scanHex.classList.add(this.styles.drawScanHex);
                    this.scanWrap.classList.add(this.styles.moveScanWrap);
                    
                    setTimeout(()=>{
                        scan.classList.add(this.styles.hideScan);
                        this.scanHex.classList.remove(this.styles.drawScanHex);
                        this.scanned = true;
                        this.moveHexagon();
                    }, this.config.scanDuration + 50)
                    setTimeout(()=>{
                        this.scanWrap.classList.remove(this.styles.moveScanWrap);
                    },this.config.scanDuration * 2)
                }
                else{
                    this.hexagons[this.currentHexIndex].classList.add(this.hexagonPoints[this.currentStep])
    
                    this.scanned = false;
                    this.currentStep++;

                    let delay = this.config.hexagonDuration;

                    if(this.currentStep === this.hexagonPoints.length){
                        delay = this.config.hexagonUpDownDuration;
                        this.hexagons[this.currentHexIndex].style.transitionDuration = this.config.hexagonUpDownDuration + 'ms';
                    }
                    setTimeout(()=>{
                        this.moveHexagon();
                    }, delay)
                }
            }
        }
        else if(this.currentHexIndex + 1 < this.hexagons.length){
            this.setHexagonToFirstPoint(this.hexagons[this.currentHexIndex]);
            
            // this.prepareNextHexagons().then(()=>{
            // })
            this.currentStep = this.config.initStep;
            this.currentHexIndex++;
            this.moveHexagon();
        }
        else if(this.currentHexIndex === this.hexagons.length -1){
            this.setHexagonToFirstPoint(this.hexagons[this.currentHexIndex]);

            if(this.config.infinite){
                this.continueMoves();
            }
            else{
                this.restart();
            }
        }
    }

    this.start = () =>{
        this.init();
        // this.showBackgr();
        this.showFirstHexagons()
            .then(()=>{
                this.moveHexagon();
            })
    }

    this.continueMoves = () =>{
        this.currentHexIndex = 0;
        this.currentStep = this.config.initStep;
        this.moveHexagon();
    }

    this.restart = () =>{
        this.currentHexIndex = 0;
        this.currentStep = this.config.initStep;

        this.hexagons[0].classList.add(this.hexagonPoints[2]);
        this.hexagons[0].style.transitionDelay = null;
        this.hexagons[0].classList.remove(`integrations-anim__path_hexagon-point-0-hidden`);
        this.hexagons[0].classList.add(`integrations-anim__path_hexagon-point-2-hidden`);
        this.hexagons[1].classList.add(this.hexagonPoints[1]);
        this.hexagons[1].style.transitionDelay = this.config.hexagonDelay + 'ms';
        this.hexagons[1].classList.remove(`integrations-anim__path_hexagon-point-0-hidden`);
        this.hexagons[1].classList.add(`integrations-anim__path_hexagon-point-1-hidden`);
        this.hexagons[2].style.transitionDelay = this.config.hexagonDelay * 2 + 'ms';

        this.showFirstHexagons()
            .then(()=>{
                this.moveHexagon();
            })
    }
}

if(document.getElementById('integrations_svg')){
    const svgAnim = new IntegrationSvgAnimation();
    svgAnim.start();
}

