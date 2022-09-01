import React from 'react';


const MaptestComFun = () => {
    const fruits = ['kiwi', 'apple', 'suika']
    const fruitsLi = fruits.map(
        (fruits, index) => {
            return <li>{fruits}</li>
        });
    return (<><ul>{fruitsLi}</ul></>);
}

export default MaptestComFun;