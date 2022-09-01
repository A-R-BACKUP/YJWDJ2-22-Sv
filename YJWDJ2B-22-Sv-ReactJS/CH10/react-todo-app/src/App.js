// import logo from './logo.svg';
import './App.css';
import React, { useState, useRef, useCallback } from 'react';
import TodoTemplate from './UIcomponents/TodoTemplate';
import TodoInsert from './UIcomponents/TodoInsert';
import TodoList from './UIcomponents/TodoList';

const createTodoDatas = () => {
    const arr = [];
    for(let i = 1; i <= 2500; i++) {
        arr.push(
            {id: i, text: `React Practice ${i}`, checked: false},
        );
    }
    return arr;
}

function App() {

    const [todos, setTodos] = useState( createTodoDatas
    //     [
    //     {id: 1, text: '레식하고 싶다.', checked: true,},
    //     {id: 2, text: '김치워리어', checked: true,},
    //     {id: 3, text: '앙 기모띠', checked: false,},
    // ]
    );


    // 고유 값으로 사용 될 id
    // ref 를 사용하여 변수 담기
    const nextId = useRef(2501);

    const onInsert = useCallback(
        (text) => {
            const todo = {
                id: nextId.current,
                text,
                checked: false,
            };
            setTodos(todos => todos.concat(todo));
            nextId.current += 1; // nextId 1 씩 더하기
        },
        [todos],
    );

    const onRemove = useCallback(
        (id) => {
            setTodos(todos.filter((todo) => todo.id !== id));
        },
        [todos],
    );

    const onToggle = useCallback(
        (id) => {
            setTodos(
                todos.map((todo) =>
                    todo.id === id ? { ...todo, checked: !todo.checked } : todo,
                ),
            );
        },
        [todos],
    );

  return (
    <>
      {/*<div>TODO APP</div>*/}
        <TodoTemplate>
            <TodoInsert />
            <TodoList todos={todos} onRemove={onRemove} onToggle={onToggle} />
        </TodoTemplate>
    </>
  );
}

export default App;

//

// // import logo from './logo.svg';
// import './App.css';
// import React, {useState, useRef, useCallback, useReducer} from 'react';
// import TodoTemplate from './UIcomponents/TodoTemplate';
// import TodoInsert from './UIcomponents/TodoInsert';
// import TodoList from './UIcomponents/TodoList';
//
// const createTodoDatas = () => {
//     const arr = [];
//     for(let i = 1; i <= 2500; i++) {
//         arr.push(
//             {id: i, text: `React Practice ${i}`, checked: false},
//         );
//     }
//     return arr;
// }
//
// const todoReducer = (todos, action) => {
//     switch (action.type) {
//         case 'INSERT':
//             return todos.concat(action.todo);
//         case 'REMOVE':
//             return (todos.filter((todo) => todo.id !== id));
//         case 'TOGGLE':
//             return setTodos(
//                 todos.map((todo) =>
//                     todo.id === id ? { ...todo, checked: !todo.checked } : todo,
//                 ),
//             );
//
//     }
// }
//
// function App() {
//
//     const [todos, dispatch] = useReducer(
//         todoReducer, // 실행 리듀서 함수
//         undefined, // 초기치
//         createTodoDatas // 초기치 생성 함수
//     );
//
//
//     const nextId = useRef(2501);
//
//     const onInsert = useCallback(
//         (text) => {
//             const todo = {
//                 id: nextId.current,
//                 text,
//                 checked: false,
//             };
//             dispatch({type:'INSERT', todo});
//             nextId.current += 1;
//         },
//         [todos],
//     );
//
//     const onRemove = useCallback(
//         (id) => {
//             dispatch({tyoe:'REMOVE', id})
//         },
//         [todos],
//     );
//
//     const onToggle = useCallback(
//         (id) => {
//             setTodos(
//                 todos.map((todo) =>
//                     todo.id === id ? { ...todo, checked: !todo.checked } : todo,
//                 ),
//             );
//         },
//         [todos],
//     );
//
//     return (
//         <>
//             {/*<div>TODO APP</div>*/}
//             <TodoTemplate>
//                 <TodoInsert />
//                 <TodoList todos={todos} onRemove={onRemove} onToggle={onToggle} />
//             </TodoTemplate>
//         </>
//     );
// }
//
// export default App;

// W T F
// Compiled with problems:
//
//
// ERROR
//
//     [eslint]
// src/App.js
// Line 99:56:   'id' is not defined        no-undef
// Line 101:20:  'setTodos' is not defined  no-undef
// Line 103:33:  'id' is not defined        no-undef
// Line 143:13:  'setTodos' is not defined  no-undef
//
// Search for the keywords to learn more about each error.