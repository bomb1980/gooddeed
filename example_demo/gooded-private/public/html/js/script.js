function _defineProperty(obj, key, value) {if (key in obj) {Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true });} else {obj[key] = value;}return obj;}const React = window.React;
const ReactDOM = window.ReactDOM;

const items = [
{ value: 14, text: 'SD1' },

{ value: 29, text: 'SD2' },

{ value: 31, text: 'SD3' },

{ value: 26, text: 'SD4' },

{ value: 18, text: 'SD5' },

{ value: 14, text: 'SD6' },

{ value: 16, text: 'SD7' },

{ value: 12, text: 'SD8' },

{ value: 12, text: 'SD9' },

{ value: 32, text: 'SD10' },

{ value: 11, text: 'SD11' },

{ value: 12, text: 'SD12' },

{ value: 20, text: 'SD13' },

{ value: 17, text: 'SD14' },

{ value: 25, text: 'SD15' },

{ value: 15, text: 'SD16' },

{ value: 12, text: 'SD17' },

{ value: 12, text: 'SD18' },

{ value: 14, text: 'SD19' },

{ value: 21, text: 'SD20' },

{ value: 12, text: 'SD21' }];





function sortByValue(a, b) {
  if (a.value > b.value) {
    return 1;
  } else if (a.value < b.value) {
    return -1;
  } else {
    return 0;
  }
}



function prepare({ items, palette, textColor, aspectRatio, scale }) {
  const itemsForRendering = [];
  let itemsBounds = {};

  for (let i = 0; i < items.length; i++) {
    let r = items[i].value,text = items[i].text,backgroundColor = palette[i % palette.length],x,y,bounds;
    switch (i) {
      case 0:
        x = 0;y = 0;
        bounds = { left: -r, top: -r, right: r, bottom: r };
        itemsBounds = { left: -r, top: -r, right: r, bottom: r };
        break;
      case 1:
        x = items[0].value + items[1].value;
        y = 0;
        bounds = { left: -r, top: -r, right: r, bottom: r };
        itemsBounds = {
          left: -items[0].value,
          top: Math.min(-items[0].value, -items[1].value),
          right: items[0].value + items[1].value * 2,
          bottom: Math.max(items[0].value, items[1].value) };

        break;
      default:
        let candidats = [];
        for (let j = 0; j < itemsForRendering.length; j++) {
          for (let k = j + 1; k < itemsForRendering.length; k++) {
            const index1 = j;
            const index2 = k;
            const x1 = itemsForRendering[index1].x;
            const y1 = itemsForRendering[index1].y;
            const r1 = itemsForRendering[index1].r + r;
            const x2 = itemsForRendering[index2].x;
            const y2 = itemsForRendering[index2].y;
            const r2 = itemsForRendering[index2].r + r;

            const a = r2;
            const b = Math.sqrt(Math.pow(x1 - x2, 2) + Math.pow(y1 - y2, 2));
            const c = r1;
            if (a >= b + c || b >= a + c || c >= a + b) {continue;}

            const cos1 = (Math.pow(c, 2) - Math.pow(a, 2) + Math.pow(b, 2)) / (2 * c * b);
            const acos1 = Math.acos(cos1);
            const alpha1 = acos1 + Math.atan2(y2 - y1, x2 - x1);
            candidats.push({
              x: x1 + Math.cos(alpha1) * r1,
              y: y1 + Math.sin(alpha1) * r1 });


            let cos2 = (Math.pow(a, 2) - Math.pow(c, 2) + Math.pow(b, 2)) / (2 * a * b);
            const acos2 = Math.acos(cos2);
            const alpha2 = acos2 + Math.atan2(y1 - y2, x1 - x2);
            candidats.push({
              x: x2 + Math.cos(alpha2) * r2,
              y: y2 + Math.sin(alpha2) * r2 });

          }
        }
        candidats = candidats.filter(candidat => {
          for (let i = itemsForRendering.length; i--;) {
            const item = itemsForRendering[i];
            if (Math.pow(r + item.r, 2) * 0.95 > Math.pow(candidat.x - item.x, 2) + Math.pow(candidat.y - item.y, 2)) {
              return false;
            }
          }
          return true;
        });
        for (let i = candidats.length; i--;) {
          const candidat = candidats[i];
          candidat.bounds = {
            left: candidat.x - r,
            right: candidat.x + r,
            top: candidat.y - r,
            bottom: candidat.y + r };

        }
        let minX = Number.MAX_VALUE,maxX = Number.MIN_VALUE;
        let minY = Number.MAX_VALUE,maxY = Number.MIN_VALUE;
        for (let i = itemsForRendering.length; i--;) {
          const { bounds } = itemsForRendering[i];
          if (minX > bounds.left) {minX = bounds.left;}
          if (maxX < bounds.right) {maxX = bounds.right;}
          if (minY > bounds.top) {minY = bounds.top;}
          if (maxY < bounds.bottom) {maxY = bounds.bottom;}
        }

        const results = [];
        for (let index = candidats.length; index--;) {
          const candidat = candidats[index];
          let left = minX,right = maxX;
          let top = minY,bottom = maxY;
          if (left > candidat.bounds.left) {left = candidat.bounds.left;}
          if (right < candidat.bounds.right) {right = candidat.bounds.right;}
          if (top > candidat.bounds.top) {top = candidat.bounds.top;}
          if (bottom < candidat.bounds.bottom) {bottom = candidat.bounds.bottom;}
          const width = right - left,height = bottom - top;
          const value = Math.abs(width / height - aspectRatio) * (width * height);
          results.push({ value, index, bounds: { width, height, left, top } });
        }
        results.sort(sortByValue);

        const candidat = candidats[results[0].index];
        itemsBounds = results[0].bounds;
        x = candidat.x;
        y = candidat.y;
        bounds = candidat.bounds;}

    itemsForRendering.push({ x, y, r, text, bounds, backgroundColor });
  }

  for (let i = itemsForRendering.length; i--;) {
    const item = itemsForRendering[i];
    item.x -= itemsBounds.left;
    item.y -= itemsBounds.top;
  }

  return {
    items: itemsForRendering,
    bounds: itemsBounds };

}

class ChartBubbleView extends React.Component {constructor(...args) {super(...args);_defineProperty(this, "resize",












    () => {

      const scale = this.refs.container.offsetWidth / this.props.bounds.width;
      this.refs.svg.setAttribute('width', this.props.bounds.width * scale);
      this.refs.svg.setAttribute('height', this.props.bounds.height * scale);

      for (let i = 0; i < this.props.items.length; i++) {
        const item = this.props.items[i];
        const x = item.x * scale;
        const y = item.y * scale;
        const r = item.r * scale;
        const elementText = this.refs['text' + i];
        const elementCircle = this.refs['circle' + i];
        let fontSize = 1;
        for (let j = 1; j < r * 2; j++) {
          elementText.setAttribute('font-size', j + 'px');
          const bounds = elementText.getBBox();
          if (bounds.width > r * 2 * this.props.labelScale) {
            break;
          }
          fontSize = j;
        }

        elementCircle.setAttribute('cx', x + 'px');
        elementCircle.setAttribute('cy', y + 'px');
        elementCircle.setAttribute('r', r + 'px');
        elementText.setAttribute('font-size', fontSize + 'px');
        elementText.setAttribute('dy', fontSize / 3 + 'px');
        elementText.setAttribute('x', x + 'px');
        elementText.setAttribute('y', y + 'px');

      }
    });}

  componentDidMount() {
    let resizeTimer;
    window.addEventListener('resize', () => {
      clearTimeout(resizeTimer);
      resizeTimer = setTimeout(this.resize, 50);
    });
    this.resize();
  }

  componentDidUpdate() {
    this.resize();
  }

  render() {
    return /*#__PURE__*/(
      React.createElement("div", { ref: "container" }, /*#__PURE__*/
      React.createElement("svg", { ref: "svg" },
      this.props.items.map(({ x, y, r, backgroundColor, text }, index) => /*#__PURE__*/
      React.createElement("g", { key: index }, /*#__PURE__*/
      React.createElement("circle", {
        fill: backgroundColor,
        ref: 'circle' + index }), /*#__PURE__*/

      React.createElement("text", {
        textAnchor: "middle",
        fill: this.props.textColor,
        ref: 'text' + index },

      text))))));






  }}_defineProperty(ChartBubbleView, "propTypes", { labelScale: React.PropTypes.number.isRequired, textColor: React.PropTypes.string.isRequired, items: React.PropTypes.arrayOf(React.PropTypes.shape({ x: React.PropTypes.number.isRequired, y: React.PropTypes.number.isRequired, r: React.PropTypes.number.isRequired, backgroundColor: React.PropTypes.string.isRequired, text: React.PropTypes.string.isRequired })).isRequired });


class ChartBubble extends React.Component {






  render() {
    const { items, bounds } = prepare({
      items: this.props.items,
      palette: this.props.palette,
      textColor: this.props.textColor,
      aspectRatio: this.props.aspectRatio });


    return /*#__PURE__*/(
      React.createElement(ChartBubbleView, {
        items: items,
        bounds: bounds,
        textColor: this.props.textColor,
        labelScale: this.props.labelScale }));


  }}_defineProperty(ChartBubble, "defaultProps", { labelScale: 0.2, textColor: 'black', aspectRatio: 1 });


ReactDOM.render( /*#__PURE__*/
React.createElement("center", null, /*#__PURE__*/
React.createElement("div", { className: "container" }, /*#__PURE__*/
React.createElement(ChartBubble, {
  items: items,
  palette: ["#FFCC6A", "#FCA651", "#F36661", "#B93D5F", "#712556", "#8F498F"],
  aspectRatio: 4 / 3 }))),



document.getElementById('app'));