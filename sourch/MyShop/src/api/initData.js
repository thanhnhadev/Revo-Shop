const initData = () => (
    fetch('http://192.168.45.2/api/')// eslint-disable-line
    .then(res => res.json())
);

export default initData;
