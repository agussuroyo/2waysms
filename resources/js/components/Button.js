import React from 'react';

class Button extends React.Component {
    render() {
        return (<button type={this.props.type} className={this.props.class} value={this.props.val}>{this.props.text}</button>);
    }
}

Button.defaultProps = {
    type: 'button',
    class: 'btn btn-primary',
    text: 'Submit',
    val: 1
}

export default Button;