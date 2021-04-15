import React from 'react';
import ReactDOM from 'react-dom';

import { BrowserRouter as Router, Route } from "react-router-dom";

import Bills from "./js/Bills";
import OnBoard from "./js/OnBoard";
import Login from './js/Login.js';
import SharedFridge from "./js/SharedFridge";
ReactDOM.render(
    <Router>
            <Route exact path="/">
                <style>
                </style>
                <OnBoard/>
            </Route>
            <Route exact path="/login">
                <Login/>
            </Route>
            <Route path="/shared">
                <SharedFridge />
            </Route>
            <Route path="/bills">
                <Bills />
            </Route>
    </Router>,
    document.getElementById('root ')
);

