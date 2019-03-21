import React from 'react';
import Textarea from './Textarea';
import Submit from './Submit';
import ProgressBar from './ProgressBar';
import Alert from './Alert';

class Sms extends React.Component {

    constructor(props) {
        super(props);

        this.errors = {
            1: 'You can\'t use more than 160 characters',
            2: 'SMS content can\'t be empty',
            3: 'Please enter the phone number'
        };

        this.state = {
            sms: '',
            smsLength: 0,
            numbers: [],
            processing: false,
            percentage: 0,
            valid: true,
            errors: []
        };

        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleMessage = this.handleMessage.bind(this);
        this.handleNumbers = this.handleNumbers.bind(this);
    }

    handleSubmit(e) {

        e.preventDefault();

        this.state.sms.length === 0 ? this.addError(2) : this.removeError(2);
        this.state.sms.length > 160 ? this.addError(1) : this.removeError(1);
        this.state.numbers.length === 0 ? this.addError(3) : this.removeError(3);

        if (this.state.errors.length > 0) {
            return;
        }

        this.setState({
            processing: true,
            valid: true,
            errors: []
        });

        let divider = 2;
        let numbers = this.state.numbers;
        let splited = _.chunk(numbers, divider);
        let message = this.state.sms;
        let processes = [];
        let percent = divider / numbers.length * 100;
        percent = percent >= 100 ? 100 : percent;

        splited.map((num, i) => {

            var send = axios.post('/api/messages', {
                numbers: num,
                message: message
            }).finally(() => {
                this.setState({
                    percentage: this.state.percentage + percent
                });
            });

            processes.push(send);
        });

        axios.all(processes).then(() => {
            this.setState({
                processing: false,
                percentage: 0
            });
        });
    }

    addError(num) {
        var errors = this.state.errors;
        errors.push(num);
        errors = _.uniq(errors);
        this.setState({
            errors: errors
        });
    }

    removeError(num) {
        var errors = this.state.errors;
        _.remove(errors, function (n) {
            return parseInt(num) === parseInt(n);
        });
        this.setState({
            errors: errors
        });
    }

    handleMessage(e) {

        e.target.value.length === 0 ? this.addError(2) : this.removeError(2);
        e.target.value.length > 160 ? this.addError(1) : this.removeError(1);

        this.setState({
            valid: this.state.errors.length === 0,
            sms: e.target.value,
            smsLength: e.target.value.length
        });
    }

    handleNumbers(e) {

        e.target.value.length === 0 ? this.addError(3) : this.removeError(3);

        let numbers = e.target.value.split('\n');
        this.setState({
            numbers: numbers
        });
    }

    render() {

        let loading, alerts = [];

        if (this.state.processing) {
            loading = <ProgressBar percent={this.state.percentage} />
        }

        this.state.errors.map((v, i) => {
            alerts.push(<Alert text={this.errors[v]} key={i} type="danger" />)
        });

        return (
                <form action="" method="post" onSubmit={this.handleSubmit}>
                    {alerts}                  
                    {loading}
                    <div className='form-row'>
                        <div className='col-6'>
                            <label>Message</label>
                            <Textarea onChange={this.handleMessage} />
                            <p>
                                Character length: <em>{this.state.smsLength}</em>
                            </p>
                        </div>
                        <div className='col-6'>
                            <label>Numbers</label>
                            <Textarea onChange={this.handleNumbers} value={this.props.numbers}/>
                            <p><em>Phone number separated by new line.</em></p>
                        </div>
                        <div className="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 mt-3">
                            <Submit/>
                        </div>
                    </div>
                </form>
                );
    }
}

Sms.defaultProps = {
    numbers: ''
};

export default Sms;

