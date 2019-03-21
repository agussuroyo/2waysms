require('./bootstrap');

import React from 'react';
import { render } from 'react-dom';
import Sms from './components/Sms';

render(<Sms numbers={numbers}/>, document.getElementById('sms'));